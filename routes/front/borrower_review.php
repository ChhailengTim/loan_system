<?php

Route::get('/borrower_review', function () {
    return view('pages.front.borrower_review.index');
})->name('front.borrower_review');
