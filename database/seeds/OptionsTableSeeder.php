<?php

use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionsTableSeeder extends Seeder
{
    public function run()
    {
        $options = [
            ['name' => 'siteurl', 'value' => 'http://navigation.test'],//网站地址
            ['name' => 'homeurl', 'value' => 'http://navigation.test'],//首页地址
            ['name' => 'sitename', 'value' => '导航'],//网站名称
            ['name' => 'sitedescription', 'value' => '导航'],//网站描述
            ['name' => 'sitelogo', 'value' => '/logo.png'],//网站logo
            ['name' => 'defaultlanguage', 'value' => config('parameter_table.options.language')[0]],//默认语言
            ['name' => 'cache_time', 'value' => '10'],//缓存时长(分钟)
        ];

        Option::insert($options);
    }

}

