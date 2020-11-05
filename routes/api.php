<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\Buyer\BuyerController;
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
//old code for Api 
Route::get('login', [UserController::class, 'login']);
//  Route::post('register', [UserController::class, 'register']);
// Route::group(['middleware' => 'auth:api'], function(){
// Route::post('details',  [UserController::class, 'details']);
//old code for Api 
Route::apiResource('buyer',BuyerController::class);
Route::apiResource('category',CategoryController::class);
Route::apiResource('product',ProductController::class);
Route::apiResource('seller',SellerController::class);
Route::apiResource('transaction',TransactionController::class);
Route::apiResource('user',UserController::class);