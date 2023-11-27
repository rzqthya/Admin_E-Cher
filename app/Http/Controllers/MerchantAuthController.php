<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('merchant.login'); // Ganti dengan tampilan login merchant yang sesuai
    }

    public function login(Request $request)
    {
        $credentials = $request->all('email', 'password');


        if (Auth::guard('merchant')->attempt($credentials)) {
            // Autentikasi berhasil, redirect ke halaman merchant
            return redirect()->route('merchant.dashboard');
        }
        // dd($credentials);

        // Autentikasi gagal, tampilkan pesan error
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('merchant');
    }
}