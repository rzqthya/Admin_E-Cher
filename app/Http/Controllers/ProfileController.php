<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->nama;
        $id = auth()->id();
        $users = DB::table('users')->where('id', $id)->get();
        return view('merchant.profil', compact('users', 'name'));
    }

    public function profile_merchant(){
        
    }
}
