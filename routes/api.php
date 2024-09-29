<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/posts',[PostController::class, 'index']);
Route::get('/post/{slug}',[PostController::class, 'show']);
Route::get('/search',[PostController::class, 'search']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
