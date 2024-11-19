<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movie');
Route::get('/add-movie', [MovieController::class, 'viewAddMovie'])->name('movie.view.add');
Route::post('/add-movie', [MovieController::class, 'addMovie'])->name('movie.add');
