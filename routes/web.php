<?php

use Illuminate\Support\Facades\Route;

Route::group([
    "prefix" => "api/ipmanager",
    "namespace" => "App\Http\Controllers",
    "middleware" => 'jwt.auth.middleware',
], function () {
    Route::get('/', "IPManagerController@index");
    Route::get('find/{id}', "IPManagerController@find");
    Route::patch('update/{ip}', "IPManagerController@update");
    Route::post('create', "IPManagerController@create");
    Route::delete('kill/{ip}', "IPManagerController@kill")->middleware('is_super_admin');
});