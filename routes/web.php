<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('{any}', [AppController::class, 'index'])->where('any','.*')->middleware('auth')->name('home');