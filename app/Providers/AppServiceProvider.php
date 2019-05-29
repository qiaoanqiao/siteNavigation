<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);

        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Option::observe(\App\Observers\OptionObserver::class);
        \App\Models\CardReferee::observe(\App\Observers\CardRefereeObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        \App\Models\Category::observe(\App\Observers\CategoryObserver::class);
        \App\Models\Card::observe(\App\Observers\CardObserver::class);
        Blade::directive('option', function ($expression) {
            return "<?php echo getOption($expression); ?>";
        });
        Schema::defaultStringLength(191);
    }
}
