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

class OptionController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
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
     * @param Content $content
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
        foreach(Option::all() as $option) {
            if($option->parent_id === 0) {
                $tab->add($option->name, $this->edit($option->id)->render());
            }

        }

//        $grid->id('Id');
//        $grid->name('Name');
//        $grid->value('Value');
//        $grid->created_at('Created at');
//        $grid->updated_at('Updated at');

        return $tab->render();
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
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

    public function store()
    {
    }

    public function update($id)
    {
        dd(request()->all());
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id)
    {
        $form = new Form(new Option);
        $form->setAction(action([self::class, 'update'],
            ['id' => $id]));
        $childId = Option::buildSelectOptions([], $id);
        $optionChildData = Option::query()->whereIn('id', array_keys($childId))->get();
        $form->hasMany('children', function (Form\NestedForm $form) use ($optionChildData) {
//            foreach ($optionChildData as $value) {
//                $typeMethod = $value['type'];
//                $form->$typeMethod($value['name'], $value['describe'])
//                    ->value($value['value']);
//            }
//            $form->$typeMethod($value['name'], $value['describe'])
//                ->value($value['value']);
            foreach ($optionChildData as $value) {
                $typeMethod = $value['type'];
                $form->$typeMethod($value['name'], $value['describe'])
                    ->value($value['value']);
            }
            //todo 待完成
        });


        return $form;
    }
}
