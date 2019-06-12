<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/** @var \Illuminate\Routing\Router $router */
$router = app('router');

$router->get('/spaces/access-levels', function(\Convene\Storage\Service\Contract\SpaceAccessServiceInterface $service) {
    return response()->json($service->fetchAll());
});
