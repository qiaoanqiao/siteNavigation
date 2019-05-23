<?php

namespace App\Admin\Controllers;

use App\Models\Card;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CardController extends Controller
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
            ->header('卡片列表')
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
        return $content
            ->header('卡片详情')
            ->description('')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param  mixed  $id
     * @param  Content  $content
     *
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑卡片')
            ->description('')
            ->body($this->form()->edit($id));
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
            ->header('创建卡片')
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
        $grid = new Grid(new Card);
        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('title', '标题');
            $filter->like('describe', '描述');
            $filter->like('url', '网站地址');
            $filter->equal('category_id', '分类')->select(Category::selectOptions());

        });
        $grid->column('id', 'ID')->sortable();
        $grid->title('标题')->editable();
        $grid->describe('描述')->editable('textarea');
        $grid->url('网站地址')->editable();
        $grid->icon('图标');
        $grid->logo('网站logo')->image('/', 100, 100);;
        $grid->category_id('分类')->editable('select',
            $this->TrimArray(Category::selectOptions()));
        $grid->label('标签')->label();
        $grid->like('喜欢人数');
        $grid->order('排序');
        $grid->clicks('点击数');
        $grid->column('created_at', '创建时间')->sortable();
        $grid->column('updated_at', '最后更新时间')->sortable();

        return $grid;
    }

    public function TrimArray($table_rows)
    {
        foreach ($table_rows as $row => $str) {
            $table_rows[$row] = str_replace('&nbsp;', '', $str);
        }
        return $table_rows;
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
        $show = new Show(Card::findOrFail($id));

        $show->id('Id');
        $show->title('卡片标题');
        $show->describe('描述');
        $show->url('网站地址');
        $show->icon('图标');
        $show->logo('网站logo');
        $show->category_id('分类');
        $show->label('标签');
        $show->like('喜欢人数');
        $show->order('排序');
        $show->clicks('点击数');
        $show->created_at('创建时间');
        $show->updated_at('最后更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Card);

        $form->text('title', '卡片标题')->rules('required');
        $form->textarea('describe', '描述')->rules('nullable');
        $form->url('url', '网站地址')->rules('required', 'url');
        $form->icon('icon', trans('admin.icon'))->rules('nullable')->default('fa-bars')
            ->rules('required')->help($this->iconHelp());
        $form->image('logo', '网站logo')->removable()->rules('required');
        $form->select('category_id', '分类')
            ->options(Category::selectOptions())->rules('required');
        $form->text('label', '标签')->help('英文逗号","分隔')->rules('nullable');
        $form->number('like', '喜欢人数');
        $form->number('order', '排序');
        $form->number('clicks', '点击数');

        return $form;
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
}
