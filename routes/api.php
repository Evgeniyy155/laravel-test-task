<?php

use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(GenreController::class)->prefix('genres')->group(function (){
    Route::get('/', 'index');
    Route::get('/{genre}', 'show');
});
Route::controller(MovieController::class)->prefix('movies')->group(function (){
    Route::get('/', 'index');
    Route::get('/{movie}', 'show');
});

