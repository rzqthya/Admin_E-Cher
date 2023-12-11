@extends('adminjr.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Merchant</h1>
    <p class="mb-4">
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Merchant Baru</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Merchant</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Merchant</th>
                            <th>Kategori</th>
                            <th>Kota</th>
                            <th>Alamat</th>
                            <th>Tanggal terdaftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    @foreach ($merchants as $merchant)
                    <tbody>
                        @if ($merchant->user && $merchant->user->role === 'merchant')
                        <tr>
                            <td>{{ $merchant->user->nama }}</td>
                            <td>{{ $merchant->kategori }}</td>
                            <td>{{ $merchant->kota ? $merchant->kota->kota : 'N/A' }}</td>
                            <td>{{ $merchant->alamat }}</td>
                            <td>{{ $merchant->created_at->format('Y-m-d') }}</td>
                            <td>
                                {{-- detail --}}
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{ $merchant->id }}"><i class="fas fa-solid fa-magnifying-glass"></i></a>
                                <span>
                                    {{-- Edit --}}
                                    <a href="{{ route('admin.edit', ['admin' => $merchant->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                </span>
                                <span>
                                    {{-- Hapus --}}
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{ $merchant->id }}"><i class="fas fa-trash-alt"></i></a>
                                </span>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                    @endforeach
                </table>
            </div>

            @foreach ($merchants as $merchant)
            <div class="modal fade" id="exampleModalCenter{{ $merchant->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus
                                Merchant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus merchant ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <form action="{{ route('admin.destroy', ['admin' => $merchant->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ($merchants as $merchant)
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal{{ $merchant->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Merchant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Kolom pertama -->
                                    <div class="mb-3">
                                        <strong>Nama Merchant:</strong>
                                        <p>{{ $merchant->merchant }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <strong>Kategori:</strong>
                                        <p>{{ $merchant->kategori }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <strong>Nama Kota Terdaftar:</strong>
                                        <p>{{ $merchant->kota ? $merchant->kota->kota : 'N/A' }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Kolom kedua -->
                                    <div class="mb-3">
                                        <strong>Alamat Merchant:</strong>
                                        <p>{{ $merchant->alamat }}</p>
                                    </div>

                                    <div class="mb-6">
                                        <div class="mb-3">
                                            <strong>Email:</strong>
                                            <p>{{ $merchant->user->email }}</p>
                                        </div>


                                        <div class="mb-3">
                                            <strong>Tanggal Terdaftar:</strong>
                                            <p>{{ $merchant->created_at->format('Y-m-d') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection