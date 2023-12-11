@extends('adminjr.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Merchant</h1>

    </div>

    <!-- Content Row -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Merchant</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.update', ['admin' => $merchants->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nama Merchant</label>
                    <input class="form-control mb-4" type="text" id="merchant" name="merchant" value="{{ $merchants->user->nama }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Kategori</label>
                    <input class="form-control mb-4" type="text" id="kategori" name="kategori" value="{{ $merchants->kategori }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Kota/Kabupaten</label>
                    <select class="form-control" id="kota_id" name="kota_id">
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $merchants->kota_id == $city->id ? 'selected' : '' }}>
                            {{ $city->kota }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Alamat</label>
                    <input class="form-control mb-4" type="text" id="alamat" name="alamat" value="{{ $merchants->alamat }}">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $merchants->user->email }}">
                    <small class="form-text text-muted">We'll never share your
                        email with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
            </form>
        </div>
    </div>


    <!-- Content Row -->

    <div class="row">


    </div>



</div>
@endsection