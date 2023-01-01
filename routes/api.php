<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('products/softdelete', [ProductController::class, 'readSoftDeletedProducts']);
Route::get('products/restore/{id}', [ProductController::class, 'restoreSoftDeletedProduct']);
// force delete soft deleted products
Route::delete('products/forceDelete/{id}', [ProductController::class, 'forceDeleteSoftDeletedProduct']);
// Get user form product
Route::get('products/user/{id}', [ProductController::class, 'getUserFromProduct']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('products', [ProductController::class, 'index']);


Route::post('products', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);  
Route::delete('products/softdelete/{id}', [ProductController::class, 'softDelete']);
Route::post('/logout', [AuthController::class, 'logout']);

/**
 * Roles
 */
Route::post('roles', [RoleController::class, 'addRole']);
Route::get('roles', [RoleController::class, 'getRoles']);
Route::get('roles/{id}', [RoleController::class, 'getRole']);
Route::put('roles/{id}', [RoleController::class, 'updateRole']);
Route::delete('roles/{id}', [RoleController::class, 'deleteRole']);

/**
 * Auth
 */
// get user role bu id
Route::get('user/role/{id}', [AuthController::class, 'getUserRole']);
// get all users with roles
Route::get('users/roles', [AuthController::class, 'getAllUsers']);

Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



/**
* Countries
*/
Route::get('countries', [CountryController::class, 'getCountries']);
Route::get('countries/products/{id}', [CountryController::class, 'getProductsFromCountry']);
Route::get('countries/{id}', [CountryController::class, 'getCountry']);
Route::post('countries', [CountryController::class, 'addCountry']);
Route::put('countries/{id}', [CountryController::class, 'updateCountry']);
Route::delete('countries/{id}', [CountryController::class, 'deleteCountry']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {
 
});


/**
 * polymorphic
 */
// user has many photos
Route::get('user/photos/{id}', [AuthController::class, 'getPhoto']);
// get product photos
Route::get('product/photos/{id}', [ProductController::class, 'getPhotos']);


