<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
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
            'reco',
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
        return Cache::remember(request()->route()->getAction('as'), 300,
            function () use ($wheres) {
                return self::query()->where($wheres)->orderBy('order', 'desc')
                    ->get();
            });
    }

    /**
     * 获取推荐的全部卡片
     *
     * @return Collection
     */
    public function getRecommendationsCards()
    {
        return Cache::remember('recommend_all_cards', cacheTime(),
            function () {
                return self::query()
                    ->where('reco',
                        modelConfig('card', 'reco_str_int', 'recommended'))
                    ->get();
            });
    }

    /**
     * 获取非推荐的全部卡片
     *
     * @return mixed
     */
    public function toObtainRecommendedCards()
    {
        return Cache::remember('not_recommend_all_cards', 300,
            function () {
                return self::query()
                    ->whereNotIn('reco',
                        modelConfig('card', 'reco_str_int', 'recommended'))
                    ->get();
            });
    }

    /**
     *模型的「启动」方法.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('order', 'desc');
        });
    }

}
