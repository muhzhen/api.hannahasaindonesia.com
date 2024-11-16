<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

//posts
Route::get('/posts',[PostController::class, 'index']);
Route::get('/post/{slug}',[PostController::class, 'show']);
Route::get('/search',[PostController::class, 'search']);
