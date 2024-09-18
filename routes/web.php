<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;

// We define a name to make references to the name

Route::get('/homepage', [HomeController::class, 'home'])->name('homepage.home');
Route::get('/support', [SupportController::class, 'index'])->name('support.index');

Route::get('/', function () {
    return view('welcome');
});

