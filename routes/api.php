<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('register', 'Auth\AuthController@register');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
});

//Employee
    Route::get('index', 'API\EmployeeController@index');
    Route::post('store', 'API\EmployeeController@store');
    Route::get('delete/{id}', 'API\EmployeeController@delete');
    Route::get('edit/{id}', 'API\EmployeeController@edit');
    Route::post('update/{id}', 'API\EmployeeController@update');




