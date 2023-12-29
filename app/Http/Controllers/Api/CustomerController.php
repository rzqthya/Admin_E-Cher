<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Formulir;
use App\Models\Wilayah;
use App\Models\Merchant;
use App\Models\Voucher;
use Validator;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\MerchantResource;
use App\Http\Resources\VoucherResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class CustomerController extends BaseController
{
    public function apiGetCustomer()
    {
        $customers = User::where('role', 'customer')->get();
        return $this->sendResponse(CustomerResource::collection($customers), 'Customer retrieved successfully.');
    }


    public function apiGetVoucher()
    {
        $vouchers = Voucher::all();
        return $this->sendResponse(VoucherResource::collection($vouchers), 'Voucher retrieved successfully.');
    }

    public function apiGetWilayah()
    {
        $wilayahData = Wilayah::all();

        $response = $wilayahData->map(function ($wilayah) {
            return [
                'id' => $wilayah->id,
                'samsat' => $wilayah->samsat,
                'alamat' => $wilayah->alamat,
            ];
        });

        return response()->json($response);
    }

    public function apiGetMerchant()
    {
        $merchants = Merchant::all();
        return $this->sendResponse(MerchantResource::collection($merchants), 'Merchant retrieved successfully.');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'noTelp' => $request->noTelp,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['user' => $user, 'message' => 'Registration successful.']);
    }

    public function loginCustomer(Request $request)
    {
        // $pass = bcrypt($request->passsword);
        $credentials = $request->only('email', 'password');
        // // print($credentials);
        print($request->email);
        printf($request->password);
        // Gunakan metode attempt untuk otentikasi
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Jika otentikasi berhasil, berikan respons dengan token atau informasi pengguna yang lain
            return response()->json(['user' => $user, 'message' => 'Login successful']);
        } else {
            // Jika otentikasi gagal, berikan respons dengan pesan kesalahan
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function logoutCustomer()
    {
        // Gunakan facade Auth untuk melakukan logout
        Auth::logout();

        // Return respons
        return response()->json(['message' => 'Logout berhasil']);
    }
}
