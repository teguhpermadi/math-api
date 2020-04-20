<?php

// user
Route::post('register', 'Api\RegisterController@action');
Route::post('login', 'Api\LoginController@action');
Route::get('me', 'Api\UserController@me')->middleware('auth:api');

// ki
Route::get('ki', 'Api\KompetensiIntiController@index')->middleware('auth:api');
Route::post('ki', 'Api\KompetensiIntiController@store')->middleware('auth:api');
Route::get('ki/{id}', 'Api\KompetensiIntiController@show')->middleware('auth:api');
Route::put('ki/{id}', 'Api\KompetensiIntiController@update')->middleware('auth:api');
Route::delete('ki/{id}', 'Api\KompetensiIntiController@delete')->middleware('auth:api');

// kd
Route::get('kd', 'Api\KompetensiDasarController@index')->middleware('auth:api');
Route::post('kd', 'Api\KompetensiDasarController@store')->middleware('auth:api');
Route::get('kd/{id}', 'Api\KompetensiDasarController@show')->middleware('auth:api');
Route::put('kd/{id}', 'Api\KompetensiDasarController@update')->middleware('auth:api');
Route::delete('kd/{id}', 'Api\KompetensiDasarController@delete')->middleware('auth:api');
