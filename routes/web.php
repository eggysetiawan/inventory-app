<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, ActivityController, LanguageController};





Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware('lang')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('activities', ActivityController::class);

        Route::patch('language', LanguageController::class)->name('lang');

        Route::resource('products', ProductController::class)->parameters([
            'products' => 'product:slug',
        ]);
    });
});
