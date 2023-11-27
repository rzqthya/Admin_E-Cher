<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Merchant;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\VoucherEmail;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $pageTitle = 'Form';

        return response(view('form', ['Form' => $pageTitle]));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Success Add User!');
    }

    public function showForm($voucher_id, $merchant_id)
    {
        $merchant = Merchant::find($merchant_id);
        $voucher = Voucher::find($voucher_id);
        $vouchers = Voucher::all(); // Menyertakan daftar voucher
        $wilayahs = Wilayah::all();

        return view('form', [
            'merchant' => $merchant,
            'voucher' => $voucher,
            'vouchers' => $vouchers,
            'wilayahs' => $wilayahs
        ]);
    }

    public function processForm(Request $request)
    {

        // Mendapatkan data voucher
        $voucher = Voucher::find($request->input('voucher_id'));

        // dd($request->all());

        if ($request->hasFile('uploadFoto')) {
            $file = $request->file('uploadFoto');
            $originalFilename = $file->getClientOriginalName();
            // Simpan file tanpa hashing
            $file->storeAs('public/uploads', $originalFilename);
        } else {
            $originalFilename = null;
        }

        $formulir = new Formulir([
            'nama_user' => $request->input('nama'),
            'email_user' => $request->input('email'),
            'nopol' => $request->input('nopol'),
            'no_hp' => $request->input('no_hp'),
            'wilayah_id' => $request->input('wilayah'),
            'merchant_id' => $request->input('merchant_id'),
            'voucher_id' => $request->input('voucher_id'),
            'uploadFoto' => 'uploads/' . $originalFilename,
            'status_voucher' => false,
            'status_klaim' => false,
        ]);

        $formulir->save();

        $merchant = Merchant::find($request->input('merchant_id'));
        $voucher = Voucher::find($request->input('voucher_id'));
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'nopol' => $request->input('nopol'),
            'merchant_id' => $merchant->nama_merchant,
            'voucher_id' => $voucher->nama_voucher,
            'masa_berlaku' => $voucher->masa_berlaku,
        ];

        Mail::to($request->input('email'))
            ->send(new VoucherEmail($data));


        return redirect()->route('home');
    }
}
