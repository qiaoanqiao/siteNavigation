<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\LoanApplication;
use App\Models\User;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Table;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $rows = [
            ['系统名称', config('admin.name')],
            ['系统版本', 'Version 1.0'],//todo 升级后修改
            ['联系邮箱', 'imhereyougone@163.com'],
            ['版权所有', '&copy;2019 Murry'],
        ];
        $table = new Table([], $rows);

        return $content
            ->header(getOption('site_name'))
            ->description('仪表盘')
            ->row(function ($row) {
                $row->column(6,
                    new InfoBox('平台用户量', 'users', 'aqua', '/admin/user',
                        User::count()));
                $row->column(6,
                    new InfoBox('卡片总数', 'credit-card', 'aqua', '/admin/card',
                        Card::count()));
            })
            ->row((new Box('系统信息', $table))->style('info'));
    }
}
