<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes Login Register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public routes Categories
Route::get('/categories', [CategoryController::class, 'index']);
// Public routes Categories search
Route::get('/categories/search/{category}', [CategoryController::class, 'searchCategory']);

// Public routes Products all
Route::get('/products', [ProductsController::class, 'index']);
// Public routes Products search
Route::get('/products/search', [ProductsController::class, 'search']);


// Protected routes
Route::group(['middleware' => 'auth:sanctum'], function(){

    // Create Order
    Route::post('/order', [OrderController::class, 'create']);

    // userId Order get
    Route::get('/order/{id}', [OrderController::class, 'index']);

    // Delete Order user_id
    Route::delete('/order/delete/{id}', [OrderController::class, 'delete']);

    // Logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});