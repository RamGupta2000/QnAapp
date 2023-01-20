<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\test;


Auth::routes();


Route::get('/', function () {
    return view('home');
});
Route::get('/data', [test::class, 'index']);

Route::get('{any}', function () {
    return view('home');
})->where('any', '.*')->middleware('auth');



// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('{any}', [AppController::class, 'index'])->where('any', '.*')->middleware('auth')->name('home');
// Route::get('login', 'Auth\LoginController@shodwLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');