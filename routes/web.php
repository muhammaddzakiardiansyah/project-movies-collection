<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movie');
Route::get('/add-movie', [MovieController::class, 'viewAddMovie'])->name('movie.view.add');
Route::post('/add-movie', [MovieController::class, 'addMovie'])->name('movie.add');
Route::get('/update-movie/{id}', [MovieController::class, 'viewUpdateMovie'])->name('movie.view.update');
Route::post('/update-movie/{id}', [MovieController::class, 'updateMovie'])->name('movie.update');
Route::delete('/delete-movie/{id}', [MovieController::class, 'deleteMovie'])->name('movie.delete');
