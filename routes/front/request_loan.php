<?php

Route::get('/request_loan', function () {
    return view('pages.front.request_loan.index');
})->name('front.request_loan');
