<?php

namespace App\Admin\Controllers;

use App\Models\Option;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Tab;
use Illuminate\Support\Facades\Input;

class OptionController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param  Content  $content
     *
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('网站配置')
            ->description('')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param  mixed  $id
     * @param  Content  $content
     *
     * @return Content
     */
    public function show($id, Content $content)
    {
        return back();
    }

    /**
     * Edit interface.
     *
     * @param  mixed  $id
     * @param  Content  $content
     *
     * @return Form
     */
    public function edit($id)
    {
        return $this->form($id)->edit($id);
    }

    /**
     * Create interface.
     *
     * @param  Content  $content
     *
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return string
     */
    protected function grid()
    {
        $tab = new Tab();
        foreach (Option::all() as $option) {
            if ($option->parent_id === 0) {
                $tab->add($option->name, $this->edit($option->id)->render());
            }

        }

        return $tab->render();
    }

    /**
     * Make a show builder.
     *
     * @param  mixed  $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Option::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->value('Value');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $requetInput = request()->except(['_token', '_method', '_previous_']);
        \DB::beginTransaction();
        try {
            foreach ($requetInput as $key => $value) {
                $model = Option::query()->where('name', $key)
                    ->where('parent_id', $id)->first();
                if (!empty($model)) {
                    if ($model->value !== $value) {
                        //模型事件updating配合完成更新
                        $this->form($model->id, 1)->update($model->id);
                    }
                }

            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            admin_toastr('更新失败', 'error');
        }
        admin_toastr(trans('admin.update_succeeded'));

        return back();
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form($id, $isMethod = 0)
    {
        $form = new Form(new Option);
        $form->disableEditingCheck();
        $form->disableCreatingCheck();
        $form->disableViewCheck();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
            $tools->disableList();
        });
        $form->setAction(action([self::class, 'update'],
            ['id' => $id]));
        if($isMethod) {
            $value = Option::find($id);
            $typeMethod = $value['type'];
            $form->$typeMethod($value['name']);
        } else {
            $childId = Option::buildSelectOptions([], $id);
            $optionChildData = Option::query()
                ->whereIn('id', array_keys($childId))->get();
            foreach ($optionChildData as $value) {
                $typeMethod = $value['type'];
                if($value['type'] === 'image' or $value['type'] === 'file') {
                    $form->$typeMethod($value['name'], $value['describe'])
                        ->value($value['value'])->default($value['value']);
                } else {
                    $form->$typeMethod($value['name'], $value['describe'])
                        ->value($value['value'])->default($value['value']);
                }

            }
        }

        return $form;
    }
}
