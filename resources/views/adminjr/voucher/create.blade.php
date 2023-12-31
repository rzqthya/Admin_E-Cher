@extends('adminjr.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Voucher</h1>

    </div>

    <!-- Content Row -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Form Tambah Voucher Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('voucher.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Voucher</label>
                    <input class="form-control mb-4" id="voucher" name="voucher" type="text" placeholder="Voucher">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Deskripsi Voucher</label>
                    <input class="form-control mb-4" type="text" id="deskripsi" name="deskripsi" placeholder="Deskripsikan...">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Masa Berlaku</label>
                    <input class="form-control mb-4" type="datetime-local" id="masaBerlaku" name="masaBerlaku">
                </div>
                <div class="form-group">
                    <label for="merchant_id" class="col-form-label">Pilih Merchant</label>
                    <select class="form-control" id="merchant_id" name="merchant_id">
                        @foreach ($users as $user)
                        @if ($user->merchant)
                        <option value="{{ $user->merchant->id }}">{{ $user->nama }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Upload Foto Voucher</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-danger mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>


    <!-- Content Row -->

    <div class="row">


    </div>



</div>
@endsection
