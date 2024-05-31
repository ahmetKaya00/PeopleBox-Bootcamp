<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/product/{id}/{type?}', [ProductController::class, 'show']);

Route::resource('/product',ProductController::class)->only(['index','show']);

