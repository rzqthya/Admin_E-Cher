<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Merchant;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;
        //rekpitulasi
        $totalMerchant = Merchant::count();
        $totalVougabung = Voucher::count();
        $totalKlaim = Formulir::count();
        $totalCust = User::where('role', 'customer')->count();

        return view('adminjr.dash', compact('totalMerchant', 'totalVougabung', 'adminName', 'totalKlaim', 'totalCust'));
    }

    public function index()
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        $cities = Kota::all();
        $merchants = Merchant::all();

        return view('adminjr.merch.index', compact('cities', 'merchants', 'adminName'));
    }


    public function profile()
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        return view('adminjr.profile', compact('adminName'));
    }


    public function create()
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        $cities = Kota::all();
        return view('adminjr.merch.create', compact('cities', 'adminName'));
    }


    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
        ];

        $validator = Validator::make($request->all(), [
            'merchant' => 'required|string',
            'kategori' => 'required',
            'kota_id' => 'required',
            'alamat' => 'required|string',
            'noTelp' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            // dd('$validator');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Membuat dan menyimpan User terlebih dahulu
        $user = new User([
            'nama' => $request->input('merchant'),
            'email' => $request->input('email'),
            'noTelp' => $request->input('noTelp'),
            'password' => Hash::make($request->input('password')),
            'role' => 'merchant',
        ]);

        $user->save();

        $merchant = new Merchant([
            'users_id' => $user->id,
            'kategori' => $request->input('kategori'),
            'alamat' => $request->input('alamat'),
            'kota_id' => $request->input('kota_id'),
        ]);

        $merchant->save();
        return redirect()->route('admin.merch.index');
    }


    public function edit($id)
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        $cities = Kota::all();
        $merchants = Merchant::find($id);

        return view('adminjr.merch.edit', compact('cities', 'merchants', 'adminName'));
    }


    public function update(Request $request, $id)
    {

        $merchant = Merchant::find($id);

        if ($merchant) {
            // Update data merchant
            $merchant->kategori = $request->input('kategori');
            $merchant->kota_id = $request->input('kota_id');
            $merchant->alamat = $request->input('alamat');

            // Update data pengguna terkait
            if ($merchant->user) {
                $merchant->user->nama = $request->input('merchant');
                $merchant->user->email = $request->input('email');
                $merchant->user->save();
            }

            $merchant->save();

            return redirect()->route('admin.merch.index')->with('success', 'Data merchant berhasil diperbarui');
        }

        return redirect()->route('admin.merch.index')->with('error', 'Merchant tidak ditemukan');
    }


    public function destroy($id)
    {
        $merchant = Merchant::find($id);

        if (!$merchant) {
            return redirect()->route('admin.merch.index')->with('error', 'Merchant not found');
        }

        $merchant->delete();

        return redirect()->route('admin.merch.index')->with('success', 'Merchant has been deleted');
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}




    // public function terimaFormulir($id)
    // {
    //     $formulir = Formulir::findOrFail($id);
    //     // Ubah status_voucher menjadi true (1)
    //     $formulir->status_voucher = true;

    //     $formulir->save();
    //     // dump($formulir->save());
    //     return redirect()->route('admin.voc.klaim');
    // }
    // public function vocberhasil()
    // {

    //     // Filter data formulir berdasarkan status klaim


    //     $user = Auth::user();
    //     $name = $user->name;
    //     $formulirs = Formulir::all();
    //     $formulirs = $formulirs->where('status_klaim', true);
    //     $wilayahs = Wilayah::all();
    //     $merchants = Merchant::all();
    //     // $konfirmasis = Konfirmasi::all();

    //     return view('adminjr.voc.berhasil', compact('formulirs', 'wilayahs', 'merchants', 'name'));
    // }

    // public function showFotoStnk($filename)
    // {
    //     $path = storage_path('app/public/uploads/' . $filename);

    //     if (!file_exists($path)) {
    //         abort(404);
    //     }

    //     return response()->file($path);
    // }
