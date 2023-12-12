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
                            <th>Nama Customer</th>
                            <th>Nama Merchant</th>
                            <th>Wilayah</th>
                            <th>No Telephone</th>
                            <th>Tanggal Klaim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formulirs as $formulir)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $formulir->user->nama }}</td>
                                <td>{{ $formulir->voucher->merchant }}</td>
                                <td>{{ $formulir->wilayah->samsat }}</td>
                                <td>{{ $formulir->user->noTelp }}</td>
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
