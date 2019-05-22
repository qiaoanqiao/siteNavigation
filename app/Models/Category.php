<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, ModelTree, AdminBuilder;

    protected $fillable = ['title', 'parent_id', 'order', 'icon'];

    /**
     * 获取博客文章的评论
     */
    public function cards()
    {
        return $this->hasMany(Card::class, 'category_id', 'id');
    }
}
