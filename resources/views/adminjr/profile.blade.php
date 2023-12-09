@extends('adminjr.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Profil Admin</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Merchant Baru</h6>
            </div>
            <div class="card-body">
                <form>
                    @foreach ($users as $user)
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nama Admin</label>
                            <input class="form-control mb-4" type="text" placeholder="{{ $user->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="{{ $user->email }}" disabled>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                email with anyone else.</small>
                        </div>
                        {{-- <a href="{{ route('dashboard') }}"
                        class="btn btn-secondary mt-4 pr-4 pl-4">Batal</a>
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Perbarui</button> --}}
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
