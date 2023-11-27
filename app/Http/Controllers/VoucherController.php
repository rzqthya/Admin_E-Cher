<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Voucher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class VoucherController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $name = $user->name;
        $id = auth()->id();
        $users = DB::table('users')->where('id', $id)->get();
        $vouchers = Voucher::all();
        $merchants = Merchant::all();

        return view('adminjr.voucher.index', compact('vouchers', 'merchants', 'name', 'users'));
    }


    public function create()
    {
        $merchants = Merchant::all();
        return view('adminjr.voucher.create', compact('merchants'));
    }


    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_voucher' => 'required',
            'deskripsi_voucher' => 'required',
            'fotoVoucher' => 'required',
            'merchant_id' => 'required|integer',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('fotoVoucher')) {
            $file = $request->file('fotoVoucher');
            $originalFilename = $file->getClientOriginalName();

            $file->storeAs('public/voucher', $originalFilename);
        } else {
            $originalFilename = null;
        }


        $voucher = new Voucher([
            'nama_voucher' => $request->input('nama_voucher'),
            'deskripsi_voucher' => $request->input('deskripsi_voucher'),
            'masa_berlaku' => $request->input('masa_berlaku'),
            'fotoVoucher' => 'voucher/' . $originalFilename,
            'merchant_id' => $request->input('merchant_id'),
        ]);

        $voucher->save();

        return redirect()->route('adminjr.voucher')->with('success', 'Voucher berhasil ditambahkan.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = Auth::user();
        $name = $user->name;
        $users = DB::table('users')->where('id', $id)->get();
        $merchants = Merchant::all();
        $vouchers = Voucher::find($id);
        return view('adminjr.voucher.edit', compact('merchants', 'vouchers', 'name'));
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::find($id);
        $voucher->nama_voucher = $request->input('nama_voucher');
        $voucher->deskripsi_voucher = $request->input('deskripsi_voucher');
        $voucher->masa_berlaku = $request->input('masa_berlaku');
        $voucher->fotoVoucher = $request->input('fotoVoucher');
        $voucher->merchant_id = $request->input('merchant_id');

        $voucher->save();
        // dump($voucher->save());

        return redirect()->route('adminjr.voucher')->with('success', 'Data berhasil diperbarui');
    }


    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);

        $voucher->delete();
        // dump($voucher->delete());
        return redirect()->route('adminjr.voucher')->with('success', 'Voucher berhasil dihapus');
    }
}