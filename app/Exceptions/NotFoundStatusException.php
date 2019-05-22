<?php
/*
 * @Author: qiaoanqiao
 * @LastEditors: qiaoanqiao
 * @Email: imhereyougone@163.com
 * @Date: 2019-05-15 20:49:45
 * @LastEditTime: 2019-05-15 20:49:45
 */

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

/**
 * 不存在的页面或接口异常(status=404)
 * Class NotFoundStatusException
 *
 * @package App\Exceptions
 */
class NotFoundStatusException extends Exception
{
    /**
     * 报告异常
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * 转换异常为 HTTP 响应
     *
     * @param  \Illuminate\Http\Request
     *
     * @return JsonResponse
     */
    public function render($request, Exception $exception)
    {
        $data = [
            'message' => $exception->getMessage(),
            'status'  => $exception->getCode(),
            'data'    => [],
        ];

        return JsonResponse::create($data);
    }
}
