<?php

use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionsTableSeeder extends Seeder
{
    public function run()
    {
        $options = factory(Option::class)->times(50)->make()->each(function ($option, $index) {
            if ($index == 0) {
                // $option->field = 'value';
            }
        });

        Option::insert($options->toArray());
    }

}

