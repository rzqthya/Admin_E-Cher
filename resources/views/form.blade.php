<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tambahkan ini di bagian atas halaman Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Form</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg">
        <div class="container">
            <img class="rounded mr-1" src="{{ Vite::asset('resources/images/Logo.png') }}" width="180" height="50"
            alt="image">
            <div class="col-sm-3 mx-auto d-flex justify-content-start align-items-center">
                <img class="rounded mr-1" src="{{ Vite::asset('resources/images/poldajatim.png') }}" width="53"
                    height="60" alt="image">
                <img class="rounded mr-1" src="{{ Vite::asset('resources/images/provjatim.png') }}" width="42"
                    height="60" alt="image">
                <img class="rounded mr-1" src="{{ Vite::asset('resources/images/jasaraharja.png') }}" width="59"
                    height="60" alt="image">
            </div>

        </div>

    </nav>

    <div class="container-sm mt-8">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-6 mt-5">

                <div class="mb-3 text-center">
                    <h4>Silahkan Isi Form</h4>
                </div>
                <hr>

                <form
                    action="{{ route('processForm', ['merchant_id' => $merchant->id, 'voucher_id' => $voucher->id]) }}"
                    method="POST" enctype="multipart/form-data" id="myForm">

                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">
                            <h6>Nama Pemilik</h6>
                        </label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <h6>Email</h6>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="nopol" class="form-label">
                            <h6>Nomor Polisi</h6>
                        </label>
                        <input type="nopol" class="form-control" id="nopol" name="nopol"
                            placeholder="Nomor Polisi" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">
                            <h6>Nomor Telepon</h6>
                        </label>
                        <input type="no_hp" class="form-control" id="no_hp" name="no_hp"
                            placeholder="Nomor Telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">
                            <h6>Upload Foto</h6>
                        </label>
                        <input type="file" class="form-control" id="uploadFoto" name="uploadFoto" accept="image/*"
                            required>
                    </div>
                    <!-- ... (inputan hidden) ... -->
                    <input type="hidden" name="merchant_id" value="{{ $merchant->id }}">
                    <input type="hidden" name="voucher_id" value="{{ $voucher->id }}">
                    <!-- ... (inputan hidden) ... -->
                    <div class="mb-3">
                        <label for="wilayah" class="form-label">
                            <h6>Wilayah</h6>
                        </label>
                        <select class="form-control" id="wilayah" name="wilayah" required>
                            <option selected>Pilih Wilayah</option>
                            @foreach ($wilayahs as $wilayah)
                                <option value="{{ $wilayah->id }}">{{ $wilayah->wilayah_samsat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>

                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const submitButton = document.getElementById('submitButton');
                if (submitButton) {
                    submitButton.addEventListener('click', function() {
                        // Cek apakah formulir valid
                        if (isFormValid()) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: 'Formulir telah berhasil dikirim. Voucher telah terkirim ke email Anda.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            // Tampilkan SweetAlert error jika formulir tidak valid
                            Swal.fire({
                                title: 'Error',
                                text: 'Mohon isi semua isian formulir.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });

            // Fungsi untuk memeriksa apakah formulir valid
            function isFormValid() {
                const nama = document.getElementById('nama').value;
                const email = document.getElementById('email').value;
                const nopol = document.getElementById('nopol').value;
                const no_hp = document.getElementById('no_hp').value;
                const wilayah = document.getElementById('wilayah').value;
                const uploadFoto = document.getElementById('uploadFoto').value;
                // Tambahkan validasi untuk input lainnya sesuai kebutuhan
                if (nama.trim() === '' || email.trim() === '' || nopol.trim() === '' || no_hp.trim() === '' || wilayah
                    .trim() === '' || uploadFoto.trim() === '') {
                    return false; // Formulir tidak valid jika ada isian yang kosong
                }
                return true; // Formulir valid jika semua isian terisi
            }
        </script>

        <footer class="text-center py-4 footer-bg">
            <div class="wave">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#ffffff" fill-opacity="1"
                        d="M0,64L80,90.7C160,117,320,171,480,192C640,213,800,203,960,197.3C1120,192,1280,192,1360,192L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
                    </path>
                </svg>
            </div>
            <img src="{{ Vite::asset('resources/images/jasaraharja.png') }}" width="40" height="40"
                alt="image">
            <dd><b>Copyright &copy
                    <script>
                        document.write(new Date().getFullYear())
                    </script> PT Jasa Raharja Cabang Jawa Timur
                </b></dd>
            <dd>Build with <span style="color: #e25555;">&#9829;</span> by ITTelkom Surabaya</dd>
        </footer>
        @vite('resources/js/app.js')
</body>

</html>
