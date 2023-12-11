<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoucherController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\UserController;

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

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/login', [HomeController::class, 'login']);
});

//middleware admin
Route::middleware(['web'])->group(function () {
    //rute dasboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    //rute manjemen merchant
    Route::get('/merch/daftar/index', [AdminController::class, 'index'])->name('admin.merch.index');
    Route::resource('admin', AdminController::class)->except(['show']);


    Route::get('/voc/klaim', [AdminController::class, 'showVoucher'])->name('admin.voc.klaim');
    Route::post('admin/terima/formulir/{id}', [AdminController::class, 'terimaFormulir'])->name('admin.terima.formulir');
    Route::get('/voc/berhasil', [AdminController::class, 'vocberhasil'])->name('adminjr.voc.berhasil');

    //rute manajemen voucher
    Route::resource('voucher', VoucherController::class)->except(['show']);

    // route daftar customer
    Route::get('/user/index', function () {
        return view('adminjr/user/index');
    })->name('adminjr.user.index');
});

Route::middleware(['merchant'])->group(function () {
    //Route::get('/dashboard', [MerchantController::class, 'dashboard'])->name('merchant.dashboard');
    Route::get('/merchant/dashboard', [MerchantController::class, 'dashboard'])->name('merchant.dashboard');
    Route::get('/merchant/profile', [MerchantController::class, 'profile'])->name('merchant.profile');
    Route::get('/merchant/checkvoc', [MerchantController::class, 'checkvoc'])->name('merchant.checkvoc');
    Route::post('/approve/{id}', [MerchantController::class, 'approve'])->name('approve.formulir');
    Route::get('/merchant/pakaivoc', [MerchantController::class, 'pakaivoc'])->name('merchant.pakaivoc');
    Route::post('/logout', [MerchantController::class, 'logout'])->name('logout');
});
