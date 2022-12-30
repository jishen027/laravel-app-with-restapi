<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('products/softdelete', [ProductController::class, 'readSoftDeletedProducts']);
Route::get('products/restore/{id}', [ProductController::class, 'restoreSoftDeletedProduct']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('products', [ProductController::class, 'index']);
Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('products', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);  
Route::delete('products/softdelete/{id}', [ProductController::class, 'softDelete']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {
 
});


