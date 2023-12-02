<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'merchant') {
                return redirect()->route('merchant.dashboard');
            }
        }

       
        return back()->withErrors(['email' => 'Kredensial tidak valid']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
