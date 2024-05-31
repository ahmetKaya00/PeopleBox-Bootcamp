<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/demo', function(){
    return "Hello RESTful Api";
});
Route::get('/users', function() {
    return User::factory()->count(10)->make();
});

// Route::apiResource('api/products', ProductController::class);
// Route::apiResource('api/users', UserController::class);

Route::apiResources([
    'api/products' => ProductController::class,
    'api/users' => UserController::class
]);


