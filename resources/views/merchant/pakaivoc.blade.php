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
                        <th>Voucher</th>
                        <th>Wilayah</th>
                        <th>No Telephone</th>
                        <th>Tanggal Klaim</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formulirs as $formulir)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $formulir->nama }}</td>
                        <td>{{ $formulir->voucher ? $formulir->voucher->voucher : 'N/A' }}</td>
                        <td>{{ $formulir->wilayah ? $formulir->wilayah->samsat : 'N/A' }}</td>
                        <td>{{ $formulir->user ? $formulir->user->noTelp : 'N/A' }}</td>
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