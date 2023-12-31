<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/login', [HomeController::class, 'login']);

    //API ROUTE
  

});

//middleware admin
Route::middleware(['web'])->group(function () {
    //rute dasboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    //rute manjemen merchant
    Route::get('/merch/daftar/index', [AdminController::class, 'index'])->name('admin.merch.index');
    Route::resource('admin', AdminController::class)->except(['show']);

    //rute manajemen voucher
    Route::resource('voucher', VoucherController::class)->except(['show']);
    Route::get('/voucher/klaim', [VoucherController::class, 'showKlaim'])->name('admin.voucher.klaim');


    // route daftar customer
    Route::get('/customer', [AdminController::class, 'customerView'])->name('customer.index');
});

Route::middleware(['merchant'])->group(function () {
    Route::get('/merchant/dashboard', [MerchantController::class, 'dashboard'])->name('merchant.dashboard');
    Route::get('/merchant/profile', [MerchantController::class, 'profile'])->name('merchant.profile');
    Route::get('/merchant/checkvoc', [MerchantController::class, 'checkvoc'])->name('merchant.checkvoc');
    Route::post('/merchant/checkvoc', [MerchantController::class, 'Updatestatus'])->name('merchant.checkvocStatus');

    Route::post('/approve/{id}', [MerchantController::class, 'approve'])->name('approve.formulir');
    Route::get('/merchant/pakaivoc', [MerchantController::class, 'pakaivoc'])->name('merchant.pakaivoc');

    Route::post('/logout', [MerchantController::class, 'merchantLogout'])->name('merchant.logout');
});
