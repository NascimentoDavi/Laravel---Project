<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;

// We define a name to make references to the name
Route::post('/supports/store', [SupportController::class, 'store'])->name('support.store');
Route::get('/supports/create', [SupportController::class, 'create'])->name('support.create');
Route::get('/supports/main', [SupportController::class, 'main'])->name('support.main');
Route::get('/homepage', [HomeController::class, 'home'])->name('homepage.home');


Route::get('/', function () {
    return view('welcome');
});

