<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\Cache;

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
            = Cache::remember('configure_cache', 1440, function () {
            return Option::query()->get()->pluck('value', 'name')->toArray();
        });
        if (empty($arguments)) {
            return $options;
        }

        if(count($arguments) > 1) {
            return array_intersect_key($options, array_flip($arguments));
        }

        return $options[$arguments[0]];
    }
}
