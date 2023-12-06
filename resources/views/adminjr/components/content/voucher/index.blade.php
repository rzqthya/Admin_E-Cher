    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Voucher</h1>
        <p class="mb-4">Berikut adalah daftar voucher yang tersebar di seluruh Jawa Timur. Klik <a
                href="{{ route('voucher.create') }}">disini</a> untuk menambahkan voucher baru.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Voucher</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Voucher</th>
                                <th>Deskripsi Voucher</th>
                                <th>Masa Berlaku</th>
                                <th>Merchant</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr>
                                    <td>{{ $voucher->voucher }}</td>
                                    <td>{{ $voucher->deskripsi }}</td>
                                    <td>{{ $voucher->masaBerlaku }}</td>
                                    <td>{{ $voucher->merchant->merchant }}</td>
                                    <td>
                                        {{-- detail --}}
                                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#myModal{{ $voucher->id }}"><i
                                                class="fas fa-solid fa-magnifying-glass"></i></a>
                                        <span>
                                            {{-- Edit --}}
                                            <a href="{{ route('voucher.edit', ['id' => $voucher->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></span>
                                        <span>
                                            {{-- Hapus --}}
                                            <a href="{{ route('voucher.delete', ['id']) }}"
                                                class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#exampleModalCenter{{ $voucher->id }}"><i
                                                    class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="exampleModalCenter{{ $voucher->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus
                                    voucher</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus voucher ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <form action="{{ route('voucher.delete', ['id' => $voucher->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($vouchers as $voucher)
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" id="myModal{{ $voucher->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data voucher</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Kolom pertama -->
                                            <div class="mb-3">
                                                <strong>Foto Voucher:</strong>
                                                <p>{{ $voucher->image }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <strong>Nama Voucher:</strong>
                                                <p>{{ $voucher->voucher }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <strong>Deskripsi Voucher:</strong>
                                                <p>{{ $voucher->deskripsi }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Kolom kedua -->
                                            <div class="mb-3">
                                                <strong>Masa Berlaku:</strong>
                                                <p>{{ $voucher->masaBerlaku }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <strong>Merchant:</strong>
                                                <p>{{ $voucher->merchant->merchant }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <strong>Tanggal Terdaftar:</strong>
                                                <p>{{ $voucher->created_at->format('Y-m-d') }}</p>
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
