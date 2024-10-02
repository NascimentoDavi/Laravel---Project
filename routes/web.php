<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// More specific routes (with {id}/edit) before {id}
Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('support.destroy');
Route::get('/supports/create', [SupportController::class, 'create'])->name('support.create');
Route::post('/supports/store', [SupportController::class, 'store'])->name('support.store');
Route::get('/supports/main', [SupportController::class, 'main'])->name('support.main');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('support.update');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('support.show'); // More generic route last
// Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('support.destroy'); // Uncomment if using DELETE

// Route for the homepage
Route::get('/homepage', [HomeController::class, 'home'])->name('homepage.home');

// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
