<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('layouts.app');
})->name('main');
Route::resource('genres', GenreController::class);
Route::resource('movies', MovieController::class);
Route::put('/movies/{movie}/publish', [MovieController::class, 'publish'])->name('movies.publish');
