<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Voucher Samsat</title>
    @vite('resources/sass/app.scss')
    <link href="/node_modules/lightbox2/dist/css/lightbox.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg">
        <div class="container">
            <img class="rounded mr-1" src="{{ Vite::asset('resources/images/Logo.png') }}" width="180" height="50"
                alt="image">
            <div class="col-sm-5 mx-auto d-block text-center">
                <img class="rounded mr-1" src="{{ Vite::asset('resources/images/poldajatim.png') }}" width="53"
                    height="60" alt="image">
                <img class="rounded mr-1" src="{{ Vite::asset('resources/images/provjatim.png') }}" width="42"
                    height="60" alt="image">
                <img class="rounded mr-1" src="{{ Vite::asset('resources/images/jasaraharja.png') }}" width="59"
                    height="60" alt="image">
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="filterSelect" class="form-label"></label>
                    <select class="form-select" id="select_res">
                        <option value="all">Pilih Kota...</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->nama_kota }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select_res').on('change', function() {
                var selectedCityId = $(this).val();
                // Kirim permintaan Ajax
                $.ajax({
                    url: '/filter-merchant-voucher',
                    type: 'GET',
                    data: {
                        city_id: selectedCityId
                    },
                    success: function(data) {
                        $('#row_merchants').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>


    <!--Content-->
    <div class="container mt-4">
        <div class="row d-flex justify-content-center justify-item-center" id="row_merchants">
            <div class="col-md-4">
                @foreach ($vouchers as $voucher)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#imageModal{{ $voucher->merchant->id }}">
                                    <img src="{{ asset('storage') . '/' . $voucher->fotoVoucher }}"
                                        class="img-fluid rounded-start"alt="image">
                                </a>


                                {{-- <a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#imageModal{{ $voucher->merchant->id }}"> --}}
                                {{-- <a href="{{ asset('storage') . '/' . $voucher->fotoVoucher }}"
                                    data-lightbox="voucher-image"> --}}
                                {{-- <img src="{{ asset('storage') . '/' . $voucher->fotoVoucher }}"
                                        class="img-fluid rounded-start"alt="image">
                                </a> --}}
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $voucher->merchant->nama_merchant }}</h5>
                                    <h6 class="card-title">{{ $voucher->nama_voucher }}</h6>
                                    <p class="card-text">{{ $voucher->merchant->kota->nama_kota }} -
                                        {{ $voucher->merchant->kategori }}</p>
                                    @if ($voucher->count() > 0)
                                        <p class="card-text">Deskripsi Voucher:</p>
                                        <ul>
                                            <li>{{ $voucher->deskripsi_voucher }}</li>
                                        </ul>
                                    @else
                                        <p class="card-text">Tidak ada deskripsi voucher.</p>
                                    @endif
                                    <a href="{{ route('form', ['voucher_id' => $voucher->id, 'merchant_id' => $voucher->merchant->id]) }}"
                                        class="btn btn-primary">Get</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    {{-- ukuran gambar menyesuaikan --}}
                    <div class="modal fade" id="imageModal{{ $voucher->merchant->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <!-- Konten modal seperti yang telah Anda definisikan sebelumnya -->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('storage') . '/' . $voucher->fotoVoucher }}" class="img-fluid"
                                        alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ukuran gambar w-100 --}}
                    {{-- <div class="modal fade" id="imageModal{{ $voucher->merchant->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('storage') . '/' . $voucher->fotoVoucher }}"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                @endforeach

            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="text-center py-4 footer-bg">
        <div class="wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,64L80,90.7C160,117,320,171,480,192C640,213,800,203,960,197.3C1120,192,1280,192,1360,192L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
                </path>
            </svg>
        </div>
        <img src="{{ Vite::asset('resources/images/jasaraharja.png') }}" width="40" height="40" alt="image">
        <dd><b>Copyright &copy
                <script>
                    document.write(new Date().getFullYear())
                </script> PT Jasa Raharja Cabang Jawa Timur
            </b></dd>
        <dd>Build with <span style="color: #e25555;">&#9829;</span> by ITTelkom Surabaya</dd>
    </footer>
    @vite('resources/js/app.js')
    <script src="/node_modules/lightbox2/dist/js/lightbox.js"></script>
</body>


</html>
