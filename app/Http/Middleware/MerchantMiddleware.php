<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MerchantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna yang sedang mencoba mengakses rute ini adalah merchant
        if (Auth::guard('merchant')->check()) {
            return $next($request);
        }

        // Jika bukan merchant, Anda dapat mengarahkan mereka ke halaman lain atau menolak akses
        return redirect('merchant.dashboard'); // Ganti dengan URL atau rute yang sesuai
    }
}