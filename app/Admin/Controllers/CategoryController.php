<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;

class CategoryController extends Controller
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
            ->header('卡片分类')
            ->description('列表')
            ->row(function (Row $row) {
                $row->column(6, $this->treeView()->render());

                $row->column(6, function (Column $column) {
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_base_path('category'));
                    $menuModel = new Category();
                    $form->select('parent_id', '上层栏目id')
                        ->options($menuModel::selectOptions())->help('目前前台只显示最多两层的栏目');
                    $form->text('title', '分类标题')
                        ->rules('required');
                    $form->text('udid', '唯一标识')
                        ->rules('required')->help('目前用于前端点击分类,在当前页面#跳转');
                    $form->icon('icon', '图标')->default('fa-bars')
                        ->rules('required')->help($this->iconHelp());
                    $form->number('order', '排序')->default(0)->help('越大越靠前');

                    $form->hidden('_token')->default(csrf_token());

                    $column->append((new Box(trans('admin.new'),
                        $form))->style('success'));
                });
            });
    }

    /**
     * @return \Encore\Admin\Tree
     */
    protected function treeView()
    {
        $menuModel = new Category();

        return $menuModel::tree(function (Tree $tree) {
            $tree->disableCreate();

            $tree->branch(function ($branch) {
                $payload
                    = "<i class='fa {$branch['icon']}'></i>&nbsp;<strong>{$branch['title']}</strong>";

                if (!isset($branch['children'])) {
                    $uri = admin_base_path('/card?category_id=' . $branch['id']);

                    $payload .= "&nbsp;&nbsp;&nbsp;<a href=\"$uri\" class=\"dd-nodrag\">查看卡片</a>";
                }

                return $payload;
            });
        });
    }

    /**
     * Help message for icon field.
     *
     * @return string
     */
    protected function iconHelp()
    {
        return 'For more icons please see <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>';
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
            ->header('分类详情')
            ->description('')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑分类')
            ->description('')
            ->body($this->form()->edit($id));
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
            ->header('创建分类')
            ->description('')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->id('Id');
        $grid->title('分类标题');
        $grid->parent_id('上层栏目');
        $grid->order('排序');
        $grid->icon('图标');
        $grid->udid('唯一标识');
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->id('Id');
        $show->title('分类标题');
        $show->parent_id('上层栏目');
        $show->order('排序');
        $show->icon('图标');
        $show->udid('唯一标识');
        $show->created_at('创建时间');
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category);

        $form->text('title', '分类标题');
        $form->number('parent_id', '上层栏目');
        $form->number('order', '排序');
        $form->icon('icon', trans('admin.icon'))->rules('nullable')
            ->default('fa-bars')
            ->rules('required')->help($this->iconHelp());
        $form->text('udid', '唯一标识');

        return $form;
    }
}
