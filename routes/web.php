<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();
Route::middleware('lang')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::patch('language', LanguageController::class)->name('lang');

        Route::resource('products', ProductController::class)->parameters([
            'products' => 'product:slug',
        ]);
    });
});
