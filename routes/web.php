<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/ip', [MainController::class, 'ip']);
Route::get('/image', [MainController::class, 'image']);
Route::get('/mail', [MainController::class, 'mail']);
Route::get('/thumbnail', [MainController::class, 'makeThumbnail']);
Route::get('/bitcoin', [MainController::class, 'bitcoin']);
Route::get('/weather', [MainController::class, 'weather']);
