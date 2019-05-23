<?php

namespace App\Admin\Controllers;

use App\Models\CardReferee;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CardRefereeController extends Controller
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
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CardReferee);

        $grid->id('Id');
        $grid->title('标题');
        $grid->describe('描述');
        $grid->category_title('申请分类名');
        $grid->icon('图标');
        $grid->url('链接地址');
        $grid->user_id('用户');
        $grid->nickname('推荐人昵称');
        $grid->homepage('推荐人个人主页');
        $grid->contact('推荐人联系方式');
        $grid->label('推荐卡片标签');
        $grid->created_at('创建时间');

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
        $show = new Show(CardReferee::findOrFail($id));

        $show->id('Id');
        $show->title('标题');
        $show->describe('描述');
        $show->category_title('申请分类名');
        $show->icon('图标');
        $show->url('链接地址');
        $show->user_id('用户');
        $show->nickname('推荐人昵称');
        $show->homepage('推荐人个人主页');
        $show->contact('推荐人联系方式');
        $show->label('推荐卡片标签');
        $show->deleted_at('删除时间');
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
        $form = new Form(new CardReferee);

        $form->text('title', '标题');
        $form->text('describe', '描述');
        $form->text('category_title', '申请分类名');
        $form->text('icon', '图标');
        $form->url('url', '链接地址');
        $form->number('user_id', '用户');
        $form->text('nickname', '推荐人昵称');
        $form->text('homepage', '推荐人个人主页');
        $form->text('contact', '推荐人联系方式');
        $form->text('label', '推荐卡片标签');

        return $form;
    }
}
