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

//Supplier
Route::get('sup-index', 'API\SupplierController@index');
Route::post('sup-store', 'API\SupplierController@store');
Route::get('sup-delete/{id}', 'API\SupplierController@delete');
Route::get('sup-edit/{id}', 'API\SupplierController@edit');
Route::post('sup-update/{id}', 'API\SupplierController@update');

//Category
Route::get('cat-index', 'API\CategoriesController@index');
Route::post('cat-store', 'API\CategoriesController@store');
Route::get('cat-delete/{id}', 'API\CategoriesController@delete');
Route::get('cat-edit/{id}', 'API\CategoriesController@edit');
Route::post('cat-update/{id}', 'API\CategoriesController@update');

//Product
Route::get('pro-index', 'API\ProductController@index');
Route::post('pro-store', 'API\ProductController@store');
Route::get('pro-delete/{id}', 'API\ProductController@delete');
Route::get('pro-edit/{id}', 'API\ProductController@edit');
Route::post('pro-update/{id}', 'API\ProductController@update');



