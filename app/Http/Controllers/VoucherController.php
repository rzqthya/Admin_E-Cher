<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Voucher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

        $merchants = Merchant::all();

        return view('adminjr.voucher.create', compact('merchants', 'adminName'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Sesuaikan dengan tipe file gambar yang diizinkan
            'merchant_id' => 'required|integer',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalFilename = $file->getClientOriginalName();

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
        ]);

        $vouchers->save();

        return redirect()->route('adminjr.voucher')->with('success', 'Voucher berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $adminUser = auth()->user();
        $adminName = $adminUser->nama;

        $merchants = Merchant::all();
        $vouchers = Voucher::find($id);

        return view('adminjr.voucher.edit', compact('merchants', 'vouchers', 'adminName'));
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::find($id);
        $voucher->voucher = $request->input('voucher');
        $voucher->deskripsi = $request->input('deskripsi');
        $voucher->masaBerlaku = $request->input('masaBerlaku');
        $voucher->merchant_id = $request->input('merchant_id');

        $voucher->save();
        // dd($voucher->save());

        return redirect()->route('adminjr.voucher')->with('success', 'Data berhasil diperbarui');
    }


    public function destroy($id)
    {

        $voucher = Voucher::find($id);
        $voucher->delete();

        // Redirect ke halaman index atau halaman lain yang diinginkan
        return redirect()->route('adminjr.voucher');
    }
}
