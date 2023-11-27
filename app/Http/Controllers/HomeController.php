<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Merchant;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $cities = Kota::all();
        $merchants = Merchant::all();
        $vouchers = Voucher::all();

        // $voucher = Voucher::find('$id');

        // dd($cities);
        // return view('home');
        return view('home', compact('cities', 'merchants','vouchers'));
    }


    public function filter(Request $request)
    {
        $selectedCityId = $request->input('city_id');

        // Ambil data merchant dan voucher berdasarkan kota yang dipilih
        $cities = Kota::all();
        $merchants = Merchant::where('kota_id', $selectedCityId)->get();
        $vouchers = Voucher::whereHas('merchant', function ($query) use ($selectedCityId) {
            $query->where('kota_id', $selectedCityId);
        })->get();


        // return response()->json(['merchants' => $merchants, 'vouchers' => $vouchers]);
        return view('partials.merchants', compact('cities', 'merchants', 'vouchers'));
    }

    public function showVoucher()
    {

        $merchants = Merchant::all();
        $vouchers = Voucher::all();

        return view('voucher-page', ['merchants' => $merchants, 'vouchers' => $vouchers]);
    }


    public function getCities()
    {
        $cities = Kota::all();
        return response()->json($cities);
    }

    public function getMerchants($cityId)
    {
        if ($cityId === 'all') {
            $merchants = Merchant::all();
        } else {
            $merchants = Merchant::where('kota_id', $cityId)->get();
        }

        return response()->json($merchants);
    }

}
