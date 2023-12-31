<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Merchant;
use App\Models\Voucher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Image;


class VoucherController extends Controller
{

    public function index()
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        $vouchers = Voucher::all();
        $merchants = Merchant::all();

        return view('adminjr.voucher.index', compact('vouchers', 'merchants', 'adminName'));
    }



    public function create()
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        $users = User::where('role', 'merchant')->get();
        $merchants = Merchant::all();

        return view('adminjr.voucher.create', compact('merchants', 'users', 'adminName'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'voucher' => 'required',
            'deskripsi' => 'required',
            'masaBerlaku' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalFilename = $file->getClientOriginalName();

            // // Membaca gambar dari file yang diunggah
            // $image = Image::make($file);

            // // Mengubah ukuran gambar
            // $image->resize(100, 100);
            
            $file->storeAs('public/voucher', $originalFilename);
        } else {
            $originalFilename = null;
        }

        $vouchers = new Voucher([
            'voucher' => $request->input('voucher'),
            'deskripsi' => $request->input('deskripsi'),
            'masaBerlaku' => $request->input('masaBerlaku'),
            'image' => 'voucher/' . $originalFilename,
            'merchant_id' => $request->input('merchant_id'),
            'created_at' => now(),
        ]);

        $vouchers->save();

        return redirect()->route('voucher.index')->with('success', 'Voucher berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        $users = User::all();
        $merchants = Merchant::all();
        $vouchers = Voucher::find($id);

        return view('admin.edit', compact('users', 'merchants', 'vouchers', 'adminName'));
    }

    public function update(Request $request, $id)
    {
        $vouchers = Voucher::find($id);

        $vouchers->voucher = $request->input('voucher');
        $vouchers->deskripsi = $request->input('deskripsi');
        $vouchers->masaBerlaku = $request->input('masaBerlaku');
        $vouchers->merchant_id = $request->input('merchant_id');

        $vouchers->save();
        // dd($voucher->save());

        return redirect()->route('voucher.index')->with('success', 'Data berhasil diperbarui');
    }

    public function showKlaim()
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        $formulirs = Formulir::all();

        return view('adminjr.voucher.klaim', compact('formulirs', 'adminName'));
    }

    public function destroy($id)
    {

        $voucher = Voucher::find($id);
        $voucher->delete();

        return redirect()->route('voucher.index');
    }
}
