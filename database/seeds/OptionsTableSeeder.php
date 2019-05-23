<?php

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    public function run()
    {
        $options = [
            [
                'id'       => 1,
                'name'     => '网站配置',
                'type'     => '',
                'describe' => '网站配置',
                'parent_id' => 0,
                'value'    => '',
            ],
            [
                'name'     => '缓存配置',
                'id'       => 2,
                'type'     => '',
                'describe' => '',
                'parent_id' => 0,
                'value'    => '',
            ],
            [
                'id'       => 3,
                'name'     => '静态资源',
                'type'     => '',
                'describe' => '',
                'parent_id' => 0,
                'value'    => '',
            ],
        ];
        $id = 4;
        $accessToSiteConfiguration = $this->accessToSiteConfiguration();
        foreach ($accessToSiteConfiguration as $oneKey => $oneValue) {
            $accessToSiteConfiguration[$oneKey]['parent_id'] = 1;
            $accessToSiteConfiguration[$oneKey]['id'] = $id;
            $id += 1;
        }

        $accessToCacheConfiguration
            = $this->accessToCacheConfiguration();
        foreach ($accessToCacheConfiguration as $oneKey => $oneValue) {
            $accessToCacheConfiguration[$oneKey]['parent_id'] = 2;
            $accessToCacheConfiguration[$oneKey]['id'] = $id;
            $id += 1;
        }
        $accessToStaticResourceAllocation
            = $this->accessToStaticResourceAllocation();
        foreach ($accessToStaticResourceAllocation as $oneKey => $oneValue) {
            $accessToStaticResourceAllocation[$oneKey]['parent_id'] = 3;
            $accessToStaticResourceAllocation[$oneKey]['id'] = $id;
            $id += 1;
        }
        $options = array_merge($options, $accessToCacheConfiguration, $accessToStaticResourceAllocation, $accessToSiteConfiguration);
        Option::insert($options);
    }

    public function accessToCacheConfiguration()
    {
        return [
            [
                'name'     => 'cache_time',
                'value'    => 600,
                'type'     => 'number',
                'describe' => '默认缓存时间(不包含配置缓存时间):',
            ],
        ];
    }

    public function accessToStaticResourceAllocation()
    {
        return [
            [
                'name'     => 'static_resource_type',
                'value'    => 'local',
                'type'     => 'select',
                'describe' => '静态资源驱动',
            ],
        ];
    }

    public function accessToSiteConfiguration()
    : array
    {
         return   [
            [
                'name'     => 'site_url',
                'value'    => 'http://navigation.test/index.html',
                'type'     => 'url',
                'describe' => '网站地址',
            ],
            //网站地址
            [
                'name'     => 'home_url',
                'value'    => 'http://navigation.test/index.html',
                'type'     => 'url',
                'describe' => '首页地址',
            ],
            //首页地址
            [
                'name'     => 'site_name',
                'value'    => '导航',
                'type'     => 'text',
                'describe' => '网站名称',
            ],
            //网站名称
            [
                'name'     => 'site_description',
                'value'    => '导航',
                'type'     => 'textarea',
                'describe' => '网站描述',
            ],
            //网站描述
            [
                'name'     => 'site_keywords',
                'value'    => '导航',
                'type'     => 'textarea',
                'describe' => '网站关键词',
            ],
            [
                'name'     => 'site_logo',
                'value'    => '/logo.png',
                'type'     => 'image',
                'describe' => '网站logo',
            ],
            [
                'name'     => 'favicon',
                'value'    => '/logo.png',
                'type'     => 'image',
                'describe' => 'favicon',
            ],
            //favicon
            [
                'name'     => 'default_language',
                'value'    => config('parameter_table.options.language')[0],
                'type'     => 'text',
                'describe' => '站点默认语言',
            ],
            [
                'name'     => 'project_address',
                'value'    => 'https://github.com/qiaoanqiao/siteNavigation',
                'type'     => 'text',
                'describe' => '项目地址(关于我们按钮)',
            ],//缓存时长(s)
        ];
    }
}

