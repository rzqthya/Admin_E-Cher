<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Kota;
use App\Models\Merchant;
use App\Models\Voucher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // return view('merchant.dashboard');
            $user = auth()->user();
            $merchantName = $user->nama;

            $activePage = 'Dashboard';

            return view('merchant.dashboard', compact('merchantName', 'activePage'));
    }

    public function index()
    {
        return view('merchant.dashboard');
    }

    public function checkvoc(Request $request)
    {
        $user = auth()->user();
        $merchantName = $user->nama;

        $activePage = 'KlaimVoucher';

        // Kembalikan tampilan Blade dengan data formulirs
        return view('merchant.checkvoc', compact('activePage', 'merchantName'));
    }

    public function pakaivoc()
    {
        $user = auth()->user();
        $merchantName = $user->nama;

        $formulirs = Formulir::all();

        $activePage = 'VoucherTerklaim';

        return view('merchant.pakaivoc', compact('formulirs', 'merchantName', 'activePage'));
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

    public function merchantLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
