<?php

namespace App\Models;

class Option extends Model
{
    protected $fillable = ['name', 'value'];

    /**
     * 获取配置参数
     *
     * @param  array  $arguments
     *
     * @return array|mixed
     */
    public static function getOption($arguments)
    {
        $options
            = joinCache('configure_cache', function () {
            return Option::query()->get()->pluck('value', 'name')->toArray();
        }, 1400);
        if (empty($arguments)) {
            return $options;
        }

        if (count($arguments) > 1) {
            return array_intersect_key($options, array_flip($arguments));
        }

        return $options[$arguments[0]];
    }
}
