<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Formulir;
use App\Models\Kota;
use App\Models\Wilayah;
use App\Models\Merchant;
use App\Models\Voucher;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\MerchantResource;
use App\Http\Resources\VoucherResource;
use App\Http\Resources\FormulirResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerController extends BaseController
{
    public function apiGetCustomer()
    {
        $customers = User::where('role', 'customer')->get();
        return $this->sendResponse(CustomerResource::collection($customers), 'Customer retrieved successfully.');
    }

    public function getActiveVouchers()
    {
        $activeVouchers = Formulir::where('status', 0)->get();

        return $this->sendResponse(FormulirResource::collection($activeVouchers), 'active retrieved successfully.');
    }

    public function getUseVouchers()
    {
        $useVouchers = Formulir::where('status', 1)->get();

        return $this->sendResponse(FormulirResource::collection($useVouchers), 'Use Voucher retrieved successfully.');
    }

    //FILTER
    public function getMerchantsByCategory($category)
    {
        $merchants = Voucher::with('merchant')
            ->whereHas('merchant', function ($query) use ($category) {
                $query->where('kategori', $category);
            })
            ->get();

        return response()->json($merchants);
    }

    public function getVouchersByCity($city)
    {
        $vouchers = Voucher::with('merchant.kota')
            ->whereHas('merchant.kota', function ($query) use ($city) {
                $query->where('id', $city);
            })->get();

        $formattedVouchers = $vouchers->map(function ($voucher) {
            return [
                'voucher' => $voucher->voucher, 
                'image' => $voucher->image,
                'masaBerlaku' => $voucher->masaBerlaku,
                'deskripsi' => $voucher->deskripsi,
                'kota' => $voucher->merchant->kota->kota,
            ];
        });

       
        return response()->json($formattedVouchers);

        // $vouchers = Voucher::with('merchant.kota')
        //     ->whereHas('merchant.kota', function ($query) use ($city) {
        //         $query->where('id', $city);
        //     })->get();

        // return response()->json($vouchers);

        // $city = strtolower($city);

        // $vouchers = Voucher::whereHas('merchant.kota', function ($query) use ($city) {
        //     $query->whereRaw('LOWER(nama) LIKE ?', ["%{$city}%"]);
        // })->get();

    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'noTelp' => $request->input('noTelp'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json(['message' => 'User updated successfully']);
    }

    public function getUserById($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            return response()->json(['user' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function getVouchersByDate(Request $request)
    {
        try {
            $date = Carbon::parse($request->query('date'));
            $vouchers = Voucher::where('masaBerlaku', '>=', $date)->get();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Format tanggal tidak valid.'], 400);
        }

        return response()->json($vouchers);
    }

    //FILTER END

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

    public function apiGetKota()
    {

        $kotaData = Kota::all();


        $response = $kotaData->map(function ($kota) {
            return [
                'id' => $kota->id,
                'kota' => $kota->kota,
            ];
        });

        return response()->json($response);
    }

    public function apiGetMerchant()
    {
        $merchants = Merchant::all();
        return $this->sendResponse(MerchantResource::collection($merchants), 'Merchant retrieved successfully.');
    }

    public function store(Request $request)
    {
        $formulir = new Formulir;
        $formulir->voucher_id = $request->voucher_id;
        $formulir->wilayah_id = $request->wilayah_id;

        $formulir->users_id = $request->users_id;

        $formulir->nama = $request->nama;
        $formulir->nopol = $request->nopol;
        $formulir->status = '0';
        $formulir->created_at = now();
        $formulir->updated_at = now();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalFilename = $file->getClientOriginalName();
            $file->storeAs('public/stnk', $originalFilename);

            $formulir->image = 'stnk/' . $originalFilename;
        } else {
            $originalFilename = null;
        }

        $dataForToken = implode('-', [
            $request->voucher_id,
            $request->wilayah_id,
            $request->users_id,
            $request->nopol
        ]);


        $hash = sha1($dataForToken);

        $uniqueCode = substr($hash, 0, 4);

        while (Formulir::where('unique_code', $uniqueCode)->exists()) {
            $uniqueCode = substr($hash, rand(1, 36), 4);
        }

        $formulir->unique_code = $uniqueCode;

        $formulir->save();

        return response()->json(['message' => 'Formulir berhasil disimpan', 'unique_code' => $uniqueCode]);
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
        // // $pass = bcrypt($request->passsword);
        // $credentials = $request->only('email', 'password');
        // // // print($credentials);
        // print($request->email);
        // printf($request->password);

        // if (Auth::attempt($credentials)) {
        //     $user = Auth::user();
        //     return response()->json(['user' => $user, 'message' => 'Login successful']);
        // } else {

        //     return response()->json(['error' => 'Invalid credentials'], 401);
        // }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            $user = Auth::user();
            $userId = $user->id;

            session(['users_id' => $userId]);

            return response()->json(['users_id' => $userId]);
        } else {
            // Login gagal
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logoutCustomer()
    {

        Auth::logout();

        // Return respons
        return response()->json(['message' => 'Logout berhasil']);
    }
}
