<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerchantAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoucherController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    Route::get('/filter-merchant-voucher', [HomeController::class, 'filter']);
    Route::get('/voucher-page', [HomeController::class, 'showVoucher'])->name('voucher-page');
    Route::get('form', [UserController::class, 'index'])->name('form');
    Route::get('/form/{voucher_id}/{merchant_id}', [UserController::class, 'showForm'])->name('form');
    Route::post('/process-form', [UserController::class, 'processForm'])->name('processForm');
});


//login logout Admin
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//middleware admin
Route::middleware(['web'])->group(function () {
    //rute dasboard
    Route::get('/admin', [AdminController::class, 'admindash'])->name('dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

    //rute manjemen merchant
    Route::get('/merch/daftar/index', [AdminController::class, 'index'])->name('admin.merch.index');
    Route::get('admin/merch/edit/{id}', [AdminController::class, 'edit'])->name('admin.merch.edit');
    Route::put('admin/merch/edit/{id}', [AdminController::class, 'update'])->name('admin.merch.update');
    Route::get('admin/merch/create', [AdminController::class, 'create'])->name('admin.merch.create');
    Route::post('admin/merch/create', [AdminController::class, 'store'])->name('admin.merch.store');
    Route::delete('admin/merch/delete/{id}', [AdminController::class, 'destroy'])->name('admin.merch.delete');

    //rute manajemen voucher
    Route::get('/voc/klaim', [AdminController::class, 'showVoucher'])->name('admin.voc.klaim');
    Route::post('admin/terima/formulir/{id}', [AdminController::class, 'terimaFormulir'])->name('admin.terima.formulir');
    Route::get('/voc/berhasil', [AdminController::class, 'vocberhasil'])->name('adminjr.voc.berhasil');
    Route::get('/voucher/index', [VoucherController::class, 'index'])->name('adminjr.voucher');
    Route::get('/voucher/create', [VoucherController::class, 'create'])->name('voucher.create');
    Route::post('/voucher/create', [VoucherController::class, 'store'])->name('voucher.store');
    Route::get('voucher/edit/{id}', [VoucherController::class, 'edit'])->name('voucher.edit');
    Route::put('voucher/edit/{id}', [VoucherController::class, 'update'])->name('voucher.update');
    Route::delete('/voucher/delete/{id}', [VoucherController::class, 'destroy'])->name('voucher.delete');
});

//login logout merchant
Route::get('/merchant', [MerchantAuthController::class, 'showLoginForm'])->name('merchant.login');
Route::post('/merchant', [MerchantAuthController::class, 'login']);
Route::post('/merchant/logout', [MerchantAuthController::class, 'logout'])->name('merchant.logout');

Route::middleware(['merchant'])->group(function () {
    Route::get('/merchant/dashboard', [MerchantController::class, 'index'])->name('merchant.dashboard');
    Route::get('/merchant/profile', [MerchantController::class, 'profile'])->name('merchant.profile');
    Route::get('/merchant/checkvoc', [MerchantController::class, 'checkvoc'])->name('merchant.checkvoc');
    Route::post('/approve/{id}', [MerchantController::class, 'approve'])->name('approve.formulir');
    Route::get('/merchant/pakaivoc', [MerchantController::class, 'pakaivoc'])->name('merchant.pakaivoc');
});