<?php

Route::get('/bank_review', function () {
    return view('pages.front.bank_review.index');
})->name('front.bank_review');
