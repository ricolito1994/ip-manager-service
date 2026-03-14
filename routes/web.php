<?php

use Illuminate\Support\Facades\Route;

Route::group([
    "prefix" => "api/ipmanager",
    "namespace" => "App\Http\Controllers",
    "middleware" => 'jwt.auth.middleware',
], function () {
    Route::get('/', "IPManagerController@index");
    Route::get('find', "IPManagerController@find");
    Route::put('update', "IPManagerController@update");
    Route::post('create', "IPManagerController@create");
    Route::delete('kill', "IPManagerController@kill");
});