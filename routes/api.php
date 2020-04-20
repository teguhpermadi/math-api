<?php

Route::post('register', 'Api\RegisterController@action');
Route::post('login', 'Api\LoginController@action');
Route::get('me', 'Api\UserController@me')->middleware('auth:api');
Route::get('ki', 'Api\KompetensiIntiController@index')->middleware('auth:api');
Route::post('ki', 'Api\KompetensiIntiController@store')->middleware('auth:api');
Route::get('ki/{id}', 'Api\KompetensiIntiController@show')->middleware('auth:api');
Route::put('ki/{id}', 'Api\KompetensiIntiController@update')->middleware('auth:api');
Route::delete('ki/{id}', 'Api\KompetensiIntiController@delete')->middleware('auth:api');