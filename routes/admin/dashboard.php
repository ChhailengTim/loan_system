<?php
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');
