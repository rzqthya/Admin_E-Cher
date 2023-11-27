<div class="col-md-4">
    @foreach ($vouchers as $voucher)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <a data-toggle="modal" data-target="#imageModal{{ $voucher->merchant->id }}">
                                <img src="{{ asset('storage') . '/' . $voucher->fotoVoucher }}" class="img-fluid rounded-start" alt="image">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $voucher->merchant->nama_merchant }}</h5>
                                <p class="card-text">{{ $voucher->merchant->kota->nama_kota }} - {{ $voucher->merchant->kategori }}</p>
                                @if ($voucher->count() > 0)
                                    <p class="card-text">Deskripsi Voucher:</p>
                                    <ul>
                                        <li>{{ $voucher->deskripsi_voucher }}</li>
                                    </ul>
                                @else
                                    <p class="card-text">Tidak ada deskripsi voucher.</p>
                                @endif
                                <a href="{{ route('form', ['voucher_id' => $voucher->id, 'merchant_id' => $voucher->merchant->id]) }}" class="btn btn-primary">Get</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="imageModal{{ $voucher->merchant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!-- Konten modal seperti yang telah Anda definisikan sebelumnya -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="{{ asset('storage') . '/' . $voucher->fotoVoucher }}" class="img-fluid" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
</div>
