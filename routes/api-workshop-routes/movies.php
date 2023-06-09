<?php

use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/all', [MovieController::class, 'showAll']);
Route::get('/movies/{id}', [MovieController::class, 'show']);
