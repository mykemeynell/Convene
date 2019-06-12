<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

/** @var \Illuminate\Routing\Router $router */
$router = app('router');

$options = [
    'middleware' => ['web', 'auth',],
];

$router->group($options, function () use ($router) {
    $router->get('/', function() { return redirect()->route('default.view'); }); // Redirect users to default url.

    $router->get('/default', 'DefaultViewController@index')->name('default.view');

    $router->get('/spaces', 'SpacesController@index')->name('spaces.view');
    $router->get('/spaces/create', 'SpacesController@showCreate')->name('spaces.showCreate');
});


