<?php

Route::get('/', function () {
    return view('pages.front.home.index');
})->name('front.home');

Route::get('/home', function () {
    return view('pages.front.home.index');
})->name('front.home');
