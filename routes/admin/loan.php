<?php
Route::post('/loan/get','App\Http\Controllers\LoanController@get');
Route::post('/loan/store','App\Http\Controllers\LoanController@store');
Route::post('/loan/edit','App\Http\Controllers\LoanController@edit');
Route::post('/loan/delete','App\Http\Controllers\LoanController@delete');
