<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'parent_id', 'order', 'icon'];

    /**
     * 获取博客文章的评论
     */
    public function cards()
    {
        return $this->hasMany(Card::class, 'category_id','id');
    }
}
