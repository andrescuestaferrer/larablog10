<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthorController;

Route::prefix('author')->name('author.')->group(function(){

    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','back.pages.auth.login')->name('login');
        Route::view('/forgot-password','back.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}',[AuthorController::class, 'ResetForm'])->name('reset-form');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home',[AuthorController::class, 'index'])->name('home');
        Route::post('/logout',[AuthorController::class, 'logout'])->name('logout');
        Route::view('/profile','back.pages.profile')->name('profile');
        Route::post('/change-profile-picture',[AuthorController::class, 'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings','back.pages.settings')->name('settings');
        Route::post('/change-blog-logo',[AuthorController::class, 'changeBlogPic'])->name('change-blog-logo');
        Route::post('/change-blog-favicon',[AuthorController::class, 'changeBlogPic'])->name('change-blog-favicon');
        Route::view('/authors','back.pages.authors')->name('authors');
    });

});