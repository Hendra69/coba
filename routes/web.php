<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/tags', \App\Http\Controllers\TagsController::class);
Route::resource('/services', \App\Http\Controllers\ServicesController::class);