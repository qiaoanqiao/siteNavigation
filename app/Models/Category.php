<?php

namespace App\Models;

class Category extends Model
{
    protected $fillable = ['title', 'parent_id', 'order', 'icon'];
}
