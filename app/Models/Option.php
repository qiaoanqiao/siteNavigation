<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use ModelTree, AdminBuilder;

    protected $fillable = ['name', 'value', 'type', 'describe', 'order'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTitleColumn('name');
    }


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
            = accessToCache('configure_cache', function () {
            $options = [];
            foreach (Option::query()->get() as $value) {
                if($value->parent_id > 0) {
                    $options[$value->name] = $value->value;
                }
            }

            return $options;
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
