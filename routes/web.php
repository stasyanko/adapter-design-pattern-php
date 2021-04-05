<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/mail', [MainController::class, 'mail']);
Route::get('/optimize-image', [MainController::class, 'optimizeImage']);
