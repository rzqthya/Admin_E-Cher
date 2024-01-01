<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
});


Route::post('/register', [CustomerController::class, 'register']);
Route::post('/login', [CustomerController::class, 'loginCustomer']);
Route::post('/logout', [CustomerController::class, 'logoutCustomer']);

//UPDATE DELETE VIEW USERS 
Route::get('/users/{id}', [CustomerController::class, 'getUserById']);
Route::put('/users/{id}', [CustomerController::class, 'update']);

//DATA CUSTOMER,VOUCHER,MERCHANT
Route::get('/getVoucher', [CustomerController::class, 'apiGetVoucher']);
Route::get('/getCustomer', [CustomerController::class, 'apiGetCustomer']);
Route::get('/getMerchant', [CustomerController::class, 'apiGetMerchant']);
Route::get('/getWilayah', [CustomerController::class, 'apiGetWilayah']);
Route::get('/getKota', [CustomerController::class, 'apiGetKota']);

//FILTER
Route::get('/merchants/by-category/{category}', [CustomerController::class, 'getMerchantsByCategory']);
Route::get('/vouchers/by-city/{city}', [CustomerController::class, 'getVouchersByCity']);
Route::get('/vouchers/by-date', [CustomerController::class, 'getVouchersByDate']);

//ACTIVE USE VOUCHER
Route::get('/active-vouchers', [CustomerController::class, 'getActiveVouchers']);

//HANDLE FORMULIR
Route::post('/formulir', [CustomerController::class, 'store']);

