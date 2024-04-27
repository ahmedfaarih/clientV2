<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::get('/partners', function() {
    return view('partners');
})->name('partners');

Route::get('/bots', function() {
    return view('bots');
})->name('bots');

Route::get('/areas', function() {
    return view('areas');
})->name('areas');

Route::get('/values', function() {
    return view('values');
})->name('values');

Route::get('/publications', function() {
    return view('publications');
})->name('publications');


