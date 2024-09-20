<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;

// We define a name to make references to the name - the name is referenced inside the views.
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('support.update');
Route::post('/supports/store', [SupportController::class, 'store'])->name('support.store');
Route::get('/supports/create', [SupportController::class, 'create'])->name('support.create');
Route::get('/supports/main', [SupportController::class, 'main'])->name('support.main');
Route::get('/homepage', [HomeController::class, 'home'])->name('homepage.home');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');
Route::get('supports/{id}', [SupportController::class, 'show'])->name('support.show');
Route::get('/', function () {
    return view('welcome'); 
});