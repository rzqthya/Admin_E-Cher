<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Check Klaim Voucher</h1>
    <p class="mb-4">Berikut adalah daftar wajib pajak yang telah mengklaim voucher. Check data wajib
        pajak apakah telah sesuai untuk berhak mengklaim voucher. Klik {{-- <a href="{{route ('adminjr.voc.berhasil')}}">halaman voucher berhasil klaim</a> untuk melihat data wajib pajak yang telah berhasil klaim voucher. --}}</p> <!-- DataTales Example
            -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Check Klaim Voucher</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pemilik</th>
                            <th>Nopol Kendaraan</th>
                            <th>Nama Voucher</th>
                            <th>Nama Merchant</th>
                            <th>Lokasi Bayar Pajak</th>
                            <th>Tanggal/Waktu Klaim</th>
                            <th>Status Klaim</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formulirs as $formulir)
                            <tr>
                                <td>{{ $formulir->nama_user }}</td>
                                <td>{{ $formulir->nopol }}</td>
                                <td>{{ $formulir->voucher->nama_voucher }}</td>
                                <td>{{ $formulir->merchant->nama_merchant }}</td>
                                <td>{{ $formulir->wilayah->wilayah_samsat }}</td>
                                <td>{{ $formulir->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if ($formulir->status_klaim)
                                        Terverifikasi
                                    @else
                                        Belum Terverifikasi
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
