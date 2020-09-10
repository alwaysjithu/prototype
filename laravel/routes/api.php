<?php

use Illuminate\Support\Facades\Route;

Route::post('postData', 'UserController@postData');

Route::post('login', 'UserController@login');

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('users', 'UserController@index');

    Route::post('logout', 'UserController@logout');

});
