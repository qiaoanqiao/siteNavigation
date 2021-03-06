<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminInitSeeder::class);
        $this->call(ColumnsCardsSeeder::class);
        $this->call(OptionsTableSeeder::class);
        \Encore\Admin\Media\MediaManager::import();
        \Encore\Admin\Helpers\Helpers::import();
    }
}
