<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/mail', [MainController::class, 'mail']);
Route::get('/make-thumbnail', [MainController::class, 'makeThumbnail']);
