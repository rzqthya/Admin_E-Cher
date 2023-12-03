<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Kota;
use App\Models\Merchant;
use App\Models\Wilayah;
use App\Models\Konfirmasi;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
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
        return view('adminjr.dash');
    }

    public function index()
    {
        $user = Auth::user();
        $name = $user->name;
        $cities = Kota::all();
        $merchants = Merchant::all();

        return view('adminjr.merch.index', compact('cities', 'merchants', 'name'));
    }
    public function profile()
    {
        $user = Auth::user();
        $name = $user->name;
        $id = auth()->id();
        $users = DB::table('users')->where('id', $id)->get();
        return view('adminjr.profile', compact('users', 'name'));
    }

    public function admindash()
    {

        $totalMerchant = DB::table('merchant')->count();
        $totalVoucher = DB::table('formulir')->count();
        $voucherTerpakai = Formulir::where('status_voucher', 1)->where('status_klaim', 1)->count();
        $voucherTValidasi = Formulir::where('status_klaim', 0)->count();

        return view('adminjr.dash', compact('totalMerchant', 'totalVoucher', 'voucherTerpakai', 'voucherTValidasi'));
    }

    public function create()
    {

        $cities = Kota::all();
        return view('adminjr.merch.create', compact('cities'));
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

        // Menggunakan User ID yang baru saja dibuat untuk membuat dan menyimpan Merchant
        $merchant = new Merchant([
            'users_id' => $user->id,
            'merchant' => $request->input('merchant'),
            'kategori' => $request->input('kategori'),
            'alamat' => $request->input('alamat'),
            'kota_id' => $request->input('kota_id'),
        ]);

        $merchant->save();
        return redirect()->route('admin.merch.index');
    }

    public function show()
    {
        return view('adminjr.profile');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $name = $user->name;
        $cities = Kota::all();
        $merchants = Merchant::find($id);

        return view('adminjr.merch.edit', compact('cities', 'merchants', 'name'));
    }


    public function update(Request $request, $id)
    {

        $merchant = Merchant::find($id);
        $merchant->nama_merchant = $request->input('nama_merchant');
        $merchant->kategori = $request->input('kategori');
        $merchant->kota_id = $request->input('kota_id');
        $merchant->alamat = $request->input('alamat');
        $merchant->email = $request->input('email');

        $merchant->save();

        return redirect()->route('admin.merch.index')->with('success', 'Data merchant berhasil diperbarui');
    }


    public function destroy($id)
    {
        // Get the merchant data by its ID
        $merchant = Merchant::find($id);

        // If the merchant is not found, return a 404 Not Found response
        if (!$merchant) {
            return redirect()->route('admin.merch.index')->with('error', 'Merchant not found');
        }

        // Delete the merchant
        $merchant->delete();

        // Return a success response or redirect
        return redirect()->route('admin.merch.index')->with('success', 'Merchant has been deleted');
    }
    public function showVoucher()
    {

        $user = Auth::user();
        $name = $user->name;
        $formulirs = Formulir::all();
        $wilayahs = Wilayah::all();
        $merchants = Merchant::all();
        // $konfirmasis = Konfirmasi::all();

        return view('adminjr.voc.klaim', compact('formulirs', 'wilayahs', 'merchants', 'name'));
    }

    public function terimaFormulir($id)
    {
        $formulir = Formulir::findOrFail($id);
        // Ubah status_voucher menjadi true (1)
        $formulir->status_voucher = true;

        $formulir->save();
        // dump($formulir->save());
        return redirect()->route('admin.voc.klaim');
    }
    public function vocberhasil()
    {

        // Filter data formulir berdasarkan status klaim


        $user = Auth::user();
        $name = $user->name;
        $formulirs = Formulir::all();
        $formulirs = $formulirs->where('status_klaim', true);
        $wilayahs = Wilayah::all();
        $merchants = Merchant::all();
        // $konfirmasis = Konfirmasi::all();

        return view('adminjr.voc.berhasil', compact('formulirs', 'wilayahs', 'merchants', 'name'));
    }

    public function showFotoStnk($filename)
    {
        $path = storage_path('app/public/uploads/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // Redirect ke halaman home
        return redirect()->route('home');
    }
}
