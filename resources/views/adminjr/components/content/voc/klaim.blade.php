<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Check Klaim Voucher</h1>
    <p class="mb-4">Berikut adalah daftar wajib pajak yang telah mengklaim voucher. Check data wajib
        pajak apakah telah sesuai untuk berhak mengklaim voucher. Klik {{-- <a href="{{route ('adminjr.voc.berhasil')}}">halaman voucher berhasil klaim</a> untuk melihat data wajib pajak yang telah berhasil klaim voucher. --}} </p> <!-- DataTales Example
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

                            <th>Status Voucher</th>
                            <th>Lihat Foto</th>
                            <th>Detail</th>
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
                                    @if ($formulir->status_voucher)
                                        Terverifikasi
                                    @else
                                        Belum Terverifikasi
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#showModal{{ $formulir->id }}">Show</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#myModal{{ $formulir->id }}">Detail</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @foreach ($formulirs as $formulir)
                <!-- Modal untuk menampilkan gambar -->
                <div class="modal fade" id="showModal{{ $formulir->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="showModalLabel{{ $formulir->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showModalLabel{{ $formulir->id }}">Lihat Foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage') . '/' . $formulir->uploadFoto }}"
                                    alt="Foto STNK Pengguna" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal untuk menampilkan detail -->
                <div class="modal fade" id="myModal{{ $formulir->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Detail Formulir</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- Tampilkan detail formulir di sini -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Kolom pertama -->
                                        <div class="mb-3">
                                            <strong>Nama Pemilik:</strong>
                                            <p>{{ $formulir->nama_user }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <strong>Nopol Kendaraan:</strong>
                                            <p>{{ $formulir->nopol }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <strong>Nama Voucher:</strong>
                                            <p>{{ $formulir->voucher->nama_voucher }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Kolom kedua -->
                                        <div class="mb-3">
                                            <strong>Nama Merchant:</strong>
                                            <p>{{ $formulir->merchant->nama_merchant }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <strong>Lokasi Bayar Pajak:</strong>
                                            <p>{{ $formulir->wilayah->wilayah_samsat }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <strong>Tanggal/Waktu Klaim:</strong>
                                            <p>{{ $formulir->wilayah->wilayah_samsat }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form untuk "Terima" -->
                            <form action="{{ route('admin.terima.formulir', ['id' => $formulir->id]) }}"
                                method="POST">
                                @csrf
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-success">Terima</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
