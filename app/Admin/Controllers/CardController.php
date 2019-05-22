<?php

namespace App\Admin\Controllers;

use App\Models\Card;
use App\Http\Controllers\Controller;
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
        $grid = new Grid(new Card);

        $grid->id('Id');
        $grid->title('Title');
        $grid->describe('Describe');
        $grid->url('Url');
        $grid->icon('Icon');
        $grid->logo('Logo');
        $grid->category_id('Category id');
        $grid->label('Label');
        $grid->like('Like');
        $grid->order('Order');
        $grid->clicks('Clicks');
        $grid->deleted_at('Deleted at');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(Card::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->describe('Describe');
        $show->url('Url');
        $show->icon('Icon');
        $show->logo('Logo');
        $show->category_id('Category id');
        $show->label('Label');
        $show->like('Like');
        $show->order('Order');
        $show->clicks('Clicks');
        $show->deleted_at('Deleted at');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

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

        $form->text('title', 'Title');
        $form->text('describe', 'Describe');
        $form->url('url', 'Url');
        $form->text('icon', 'Icon');
        $form->text('logo', 'Logo');
        $form->number('category_id', 'Category id');
        $form->text('label', 'Label');
        $form->switch('like', 'Like');
        $form->number('order', 'Order');
        $form->number('clicks', 'Clicks');

        return $form;
    }
}
