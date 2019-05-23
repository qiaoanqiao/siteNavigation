<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Card extends Model
{
    use SoftDeletes;

    /**
     * 这个属性应该被转换为原生类型.
     *
     * @var array
     */
    protected $casts
        = [
            'label' => 'array',
        ];

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
        return accessToCache(request()->route()->getAction('as'),
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
        return accessToCache('recommend_all_cards',
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
        return accessToCache('not_recommend_all_cards',
            function () {
                return self::query()
                    ->whereNotIn('reco',
                        modelConfig('card', 'reco_str_int', 'recommended'))
                    ->get();
            });
    }

}
