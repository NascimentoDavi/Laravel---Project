<?php

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/homepage', [HomeController::class, 'home']);

Route::get('/', function () {
    return view('welcome');
});
