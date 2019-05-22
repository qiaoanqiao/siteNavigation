<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->resource('card', 'CardController');
    $router->resource('card-referee', 'CardRefereeController');
    $router->resource('category', 'CategoryController');
    $router->resource('link', 'LinkController');
    $router->resource('option', 'OptionController');
    $router->resource('user', 'UserController');

});
