<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\CardReferee::observe(\App\Observers\CardRefereeObserver::class);
		\App\Models\Link::observe(\App\Observers\LinkObserver::class);
		\App\Models\Category::observe(\App\Observers\CategoryObserver::class);
		\App\Models\Card::observe(\App\Observers\CardObserver::class);

        Schema::defaultStringLength(191);
    }
}
