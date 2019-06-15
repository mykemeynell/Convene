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
    $router->get('/', 'DefaultController@redirect'); // Redirect users to default url.
    
    $router->get('/spaces', 'SpacesController@index')->name('spaces.view');
    $router->get('/spaces/create', 'SpacesController@showCreate')->name('spaces.showCreate');
    $router->post('/spaces/create', 'SpacesController@handleCreate')->name('spaces.handleCreate');
    $router->get('/spaces/{space_slug}', 'SpacesController@showActivity')->name('spaces.showActivity');

    $router->get('/spaces/{space_slug}/create', 'PagesController@showCreate')->name('page.showCreate');
    $router->post('/spaces/{space_slug}/create', 'PagesController@handleCreate')->name('page.handleCreate');
    $router->post('/spaces/{space_slug}/{page_slug}/update', 'PagesController@handleUpdate')->name('page.handleUpdate');
    $router->get('/spaces/{space_slug}/{page_slug}', 'PagesController@showPage')->name('page.showSpace');

    $router->group(['prefix' => 'api'], function() use ($router) {
        $router->get('/fetch', 'ApiController@fetchUrlMeta')->name('api.fetchUrl');
        $router->post('/uploadFile', 'ApiController@uploadFile')->name('api.uploadFile');
        $router->post('/uploadUrl', 'ApiController@uploadUrl')->name('api.uploadUrl');
    });
});
