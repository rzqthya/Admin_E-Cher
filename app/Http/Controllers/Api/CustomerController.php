<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Formulir;
use App\Models\Merchant;
use App\Models\Voucher;
use Validator;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\MerchantResource;
use App\Http\Resources\VoucherResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

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

    public function apiGetMerchant()
    {
        $merchants = Merchant::all();
        return $this->sendResponse(MerchantResource::collection($merchants), 'Merchant retrieved successfully.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'noTelp' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'noTelp' => $request->noTelp,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['user' => $user, 'message' => 'Registration successful.']);
    }
}
