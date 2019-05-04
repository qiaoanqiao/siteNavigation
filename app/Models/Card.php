<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Card extends Model
{
    use SoftDeletes;

    protected $fillable
        = [
            'title',
            'describe',
            'url',
            'icon',
            'logo',
            'category_id',
            'label',
            'like',
            'order',
        ];

    /**
     * 获取api接口中的卡片列表
     *
     * @param  array  $wheres  筛选条件
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function accessToApiInterfaceCardInList(array $wheres)
    {
        $self = self::query();

        return Cache::remember(request()->route()->getAction('as'), 300,
            function () use ($self, $wheres) {
                $self->where($wheres)->orderBy('order', 'desc')->get();
            });
    }

}
