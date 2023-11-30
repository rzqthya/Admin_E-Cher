<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Voucher</h1>

    </div>

    <!-- Content Row -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Merchant Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('voucher.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nama Voucher</label>
                    <input class="form-control mb-4" id="nama_voucher" name="nama_voucher" type="text"
                        placeholder="Nama Voucher">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Deskripsi Voucher</label>
                    <input class="form-control mb-4" id="deskripsi_voucher" name="deskripsi_voucher" type="text"
                        placeholder="Deskripsi Voucher">
                </div>
                <div class="form-group">
                    <label for="datetime_input" class="col-form-label">Masa Berlaku</label>
                    <input class="form-control mb-4" id="masa_berlaku" name="masa_berlaku" type="datetime-local">
                </div>
                <div class="form-group">
                    <label for="foto" class="col-form-label">Upload Foto Voucher</label>
                    <input type="file" class="form-control" id="fotoVoucher" name="fotoVoucher" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="merchant_id" class="col-form-label">Merchant</label>
                    <select class="form-control" id="merchant_id" name="merchant_id">
                        @foreach ($merchants as $merchant)
                            <option value="{{ $merchant->id }}">{{ $merchant->nama_merchant }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>
</div>
