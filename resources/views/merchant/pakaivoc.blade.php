@extends('merchant.layouts.app')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Voucher Berhasil Terklaim Hari ini</h4>
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemilik</th>
                            <th>Nopol Kendaraan</th>
                            <th>No HP</th>
                            <th>Lokasi Bayar Pajak</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formulirs as $formulir)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $formulir->nama_user }}</td>
                                <td>{{ $formulir->nopol }}</td>
                                <td>{{ $formulir->no_hp }}</td>
                                <td>{{ $formulir->wilayah->wilayah_samsat }}</td>
                                <td>{{ $formulir->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
