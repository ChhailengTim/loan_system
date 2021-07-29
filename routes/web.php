<?php
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models;

/**
 * Front
 */
Route::prefix('/front')->group(function () {

    include 'front/home.php';
    include 'front/request_loan.php';
    include 'front/borrower_review.php';
});



//login
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/do_login', 'App\Http\Controllers\LoginController@do_login')->name('do_login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');



//Admin block Have Auth
Route::middleware('auth')->group(function () {

    include 'admin/dashboard.php';
    include 'admin/company.php';
    include 'admin/loan.php';
});



//Admin block No Auth
Route::post('/company/get_all','App\Http\Controllers\CompanyController@getAll');
Route::post('/loan/request_loan','App\Http\Controllers\LoanController@requestLoan');



//Vue Capture
Route::get('/{vue_capture}', function () {
    return view('pages.dashboard');
})->where('vue_capture', '.*')->middleware('auth');
