<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Kota;
use App\Models\Merchant;
use App\Models\Voucher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class MerchantController extends Controller
{

    public function index()
    {

        if (Auth::guard('merchant')->check()) {
            $user = Auth::guard('merchant')->user();
            $merchantId = $user->id;


            $totalTerklaim = Formulir::where('status_klaim', 1)
                ->where('merchant_id', $merchantId)
                ->count();


            $totalBelumTerklaim = Formulir::where('status_klaim', 0)
                ->where('merchant_id', $merchantId)
                ->count();

            $name = $user->nama_merchant;
            $vouchers = Voucher::where('merchant_id', $merchantId)->get();

            return view('merchant.dashboard', compact('totalTerklaim', 'totalBelumTerklaim', 'name', 'vouchers'));
        } else {

            return redirect()->route('merchant.login');
        }
    }

    public function checkvoc(Request $request)
    {
        $user = Auth::guard('merchant')->user();
        $name = $user->nama_merchant;

        // Dapatkan semua formulir yang memiliki merchant_id yang sama dengan merchant yang login
        $formulirs = Formulir::where('merchant_id', $user->id)->get();

        // Kembalikan tampilan Blade dengan data formulirs
        return view('merchant.checkvoc', compact('formulirs', 'name'));
    }

    public function pakaivoc()
    {
        $user = Auth::guard('merchant')->user();
        $name = $user->nama_merchant;


        $formulirs = Formulir::where('merchant_id', $user->id)->where('status_klaim', true)->get();

        return view('merchant.pakaivoc', compact('formulirs', 'name'));
    }

    public function approve($id)
    {
        $user = Auth::guard('merchant')->user();
        $name = $user->nama_merchant;
        $formulir = Formulir::findOrFail($id);

        $formulir->status_klaim = true;

        $formulir->save();
        // dump($formulir->save());

        return redirect()->route('merchant.checkvoc', compact('name'));
    }

    public function profile()
    {
        $merchants = Auth::guard('merchant')->user();
        $name = $merchants->nama_merchant;
        $id = auth()->user()->id;
        $merchant = Merchant::find($id);
        // dd(auth()->user()->id);
        return view('merchant.profil', compact('merchants', 'name', 'merchant'));
    }
}