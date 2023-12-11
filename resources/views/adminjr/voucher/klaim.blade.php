@extends('adminjr.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Voucher Terklaim</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Voucher Terklaim</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Voucher</th>
                            <th>Wilayah</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Nomor Polisi</th>
                            <th>STNK</th>
                            <th>Tanggal Klaim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formulirs as $formulir)
                        <tr>
                            <td>{{ $formulir->voucher->voucher }}</td>
                            <td>{{ $formulir->wilayah->samsat }}</td>
                            <td>{{ $formulir->user->email }}</td>
                            <td>{{ $formulir->nama }}</td>
                            <td>{{ $formulir->nopol }}</td>                   
                            <td>{{ $formulir->image }}</td>
                            <td>{{ $formulir->created_at }}</td>  
                            <td>
                            {{-- detail --}}
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{ $formulir->id }}"><i class="fas fa-solid fa-magnifying-glass"></i></a>
                            </td>   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          

    </div>

</div>
@endsection