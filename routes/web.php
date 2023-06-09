<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/



$router->get('/', function () use ($router) {
    echo "<center> Welcome to our Loan Management API </center>";
});

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

Route::group([
    'prefix' => 'api/v1'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('user-profile', 'AuthController@profile');
});

Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['auth', 'role:admin']
], function ($router) {
    Route::post('generate-account', 'AccountNumberController@generateAccount');
    Route::get('customers', 'AuthController@users');
});

Route::group([
    'prefix' => 'api/v1',
    'middleware' => 'auth'
], function ($router) {
    Route::get('check-account', 'AccountNumberController@checkAccount');
    Route::get('available-loans', 'AccountNumberController@availableLoans');
    Route::post('acquire-loan', 'AccountNumberController@acquireLoan');
});
