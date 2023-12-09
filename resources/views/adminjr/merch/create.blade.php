@extends('adminjr.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Merchant</h1>

        </div>

        <!-- Content Row -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Merchant Baru</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.merch.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Nama Merchant</label>
                        <input class="form-control mb-4" id="merchant" name="merchant" type="text"
                            placeholder="Nama Merchant">
                    </div>
                    <div class="row">
                        <div class="col-6">

                            <div class="form-group">
                                <label for="kota_id" class="col-form-label">Kota/Kabupaten</label>
                                <select class="custom-select" id="kota_id" name="kota_id">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->kota }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Bidang Usaha</label>
                                <select class="custom-select" id="kategori" name="kategori">
                                    <option selected="selected">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                    <option value="Transportasi">Transportasi</option>
                                    <option value="Penginapan">Penginapan</option>
                                    <option value="Beauty">Salon dan Kecantikan</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Alamat</label>
                                <input class="form-control mb-4" type="text" id="alamat" name="alamat"
                                    placeholder="Alamat Merchant">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">No Telp</label>
                                <input class="form-control mb-4" type="text" id="noTelp" name="noTelp"
                                    placeholder="Nomor Telepon">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your
                            email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
            </div>
        </div>


        <!-- Content Row -->

        <div class="row">


        </div>



    </div>
@endsection
