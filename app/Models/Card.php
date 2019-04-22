<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'describe', 'url', 'icon', 'logo', 'category_id', 'label', 'like', 'order'];


}
