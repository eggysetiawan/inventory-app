<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, ActivityController, LanguageController};





Auth::routes();
Route::middleware('lang')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('activities', ActivityController::class);

        Route::patch('language', LanguageController::class)->name('lang');

        Route::resource('products', ProductController::class)->parameters([
            'products' => 'product:slug',
        ]);
    });
});
