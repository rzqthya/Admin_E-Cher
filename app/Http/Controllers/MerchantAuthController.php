<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('merchant.login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->all('email', 'password');


        if (Auth::guard('merchant')->attempt($credentials)) {
            return redirect()->route('merchant.dashboard');
        }
        // dd($credentials);
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('merchant');
    }
}