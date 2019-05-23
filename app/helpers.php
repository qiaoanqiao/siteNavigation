<?php

use Illuminate\Support\Facades\Cache;

/**
 * @param  string  $databaseName  数据库名称(单数)
 * @param  string  $fieldName  字段名称
 * @param  string  $key  配置数组key
 *
 * @return \Illuminate\Config\Repository|mixed|null
 */
function modelConfig($databaseName, $fieldName = '', $key = '')
{
    if (!empty($fieldName)) {
        $fieldName = '.'.$fieldName;
    }

    if ($key) {
        config('parameter_table.'.$databaseName.$fieldName);

        return config('parameter_table.'.$databaseName.$fieldName)[$key] ??
            null;
    }

    return config('parameter_table.'.$databaseName.$fieldName);

}

/**
 * 获取系统配置
 *
 * @param  mixed  ...$arguments
 *
 * @return array|mixed
 */
function getOption(...$arguments)
{
    return \App\Models\Option::getOption($arguments);
}

/**
 * 获取缓存时间(laravel5.8缓存ttl使用秒为单位)
 *
 * @return integer
 */
function cacheTime()
{
    return 60 * (getOption('cache_time') ?: 1);
}

function apiSuccessfulResponseData($info, $data = [], $code = 200)
{
    if (empty($data) && is_array($info)) {

        return \Illuminate\Http\JsonResponse::create([
            'data'    => $info,
            'message' => '获取成功!',
            'sattus'  => $code,
        ]);
    }

    return \Illuminate\Http\JsonResponse::create([
        'data'    => $data,
        'message' => $info,
        'sattus'  => $code,
    ]);

}


/**
 * @param  string  $message
 * @param $code
 *
 * @throws \App\Exceptions\NotFoundStatusException
 */
function apiErrorResponseException($message = '出现错误', $code = 500)
{
    switch ($code) {
        case 502:

            break;
        case 404:
            throw new \App\Exceptions\NotFoundStatusException($message, $code);
        default:

    }

}

/**
 * 获取缓存
 *
 * @param  string  $key
 * @param $callback
 * @param  int  $ttl
 *
 * @return mixed
 */
function accessToCache(string $key, $callback, $ttl = 0)
{
    return Cache::remember($key, $ttl ?: getOption('cache_time'),
        $callback);
}
