<?php
Route::post('/loan/request_loan','App\Http\Controllers\LoanController@requestLoan');
Route::post('/loan/get','App\Http\Controllers\Admin\LoanController@get');
Route::post('/loan/store','App\Http\Controllers\Admin\LoanController@store');
Route::post('/loan/edit','App\Http\Controllers\Admin\LoanController@edit');
Route::post('/loan/delete','App\Http\Controllers\Admin\LoanController@delete');
