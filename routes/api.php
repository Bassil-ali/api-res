<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['api','checkPassword','changelang'],'namespace' => 'Api' ], function () {

    Route::post('get-main-categories' , 'CategoriesController@index');
    Route::post('get-category-byid' , 'CategoriesController@getcategorybyid');
    Route::post('changeactive', 'CategoriesController@changeactive');

    Route::group(['prefix' => 'admin','namespace'=>'Admin'],function (){
        Route::post('login', 'AuthController@login');
    });
});

Route::group(['middleware' => ['api','checkPassword','changeLanguage','checkAdminToken:admin-api'], 'namespace' => 'Api'], function () {
    Route::get('offers', 'CategoriesController@index');
});


