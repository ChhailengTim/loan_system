<?php
Route::post('/company/get','App\Http\Controllers\CompanyController@get');
Route::post('/company/get_all','App\Http\Controllers\CompanyController@getAll');
Route::post('/company/store','App\Http\Controllers\CompanyController@store');
Route::post('/company/edit','App\Http\Controllers\CompanyController@edit');
Route::post('/company/delete','App\Http\Controllers\CompanyController@delete');
