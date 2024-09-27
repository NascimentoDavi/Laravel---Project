<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SupportAPIController;

Route::apiResource('/supports', SupportAPIController::class);
