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


    public function Updatestatus(Request $request)
    {
        $voucherCode = $request->input('voucher_code');
        $formulir = Formulir::where('unique_code', $voucherCode)->first();

        if (!$formulir) {
            return redirect()->back()->with('error', 'Kode Voucher sudah digunakan atau tidak valid.');
        }

        if ($formulir->status == 0) {
            $formulir->status = 1;
            $formulir->save();
            return redirect()->back()->with('success', 'Tukar Voucher Berhasil.');
        } else {
            return redirect()->back()->with('error', 'Voucher sudah digunakan atau tidak valid.');
        }
    }

    public function dashboard()
    {
        $user = auth()->user();
        $merchantName = $user->nama;

        $activePage = 'Dashboard';

        if ($user->merchant && $user->merchant->vouchers) {
            $merchantId = $user->merchant->id;

            $countFormulirs = Formulir::whereHas('voucher', function ($query) use ($merchantId) {
                $query->where('merchant_id', $merchantId);
            })->count();

            $countVoc = Voucher::whereHas('merchant', function ($query) use ($merchantId) {
                $query->where('merchant_id', $merchantId);
            })->count();

            $totalVoc = Formulir::where('status', 1)->count();


            return view('merchant.dashboard', compact('merchantName', 'activePage', 'countFormulirs', 'countVoc', 'totalVoc'));
        }
    }

    public function index()
    {
        return view('merchant.dashboard');
    }

    public function checkvoc(Request $request)
    {
        $user = auth()->user();
        $merchantName = $user->nama;

        // Kembalikan tampilan Blade dengan data formulirs
        return view('merchant.checkvoc', compact('merchantName'));
    }

    public function pakaivoc()
    {
        $user = auth()->user();
        $merchantName = $user->nama;

        if ($user->merchant && $user->merchant->vouchers) {
            $merchantId = $user->merchant->id;

            $formulirs = Formulir::whereHas('voucher', function ($query) use ($merchantId) {
                $query->where('merchant_id', $merchantId);
            })->get();

            return view('merchant.pakaivoc', compact('formulirs', 'merchantName'));
        }

        return redirect()->route('merchant.dashboard')->with('error', 'Merchant tidak memiliki voucher atau data terkait');
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
