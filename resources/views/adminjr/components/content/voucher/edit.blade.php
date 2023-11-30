<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Voucher</h1>

    </div>

    <!-- Content Row -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Voucher</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('voucher.update', ['id' => $vouchers->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nama Voucher</label>
                    <input class="form-control mb-4" type="text" id="nama_voucher"
                        name="nama_voucher" value="{{ $vouchers->nama_voucher }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Deskripsi Voucher</label>
                    <input class="form-control mb-4" type="text" id="deskripsi_voucher"
                        name="deskripsi_voucher" value="{{ $vouchers->deskripsi_voucher }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Masa Berlaku</label>
                    <input class="form-control mb-4" type="datetime-local" id="masa_berlaku"
                        name="masa_berlaku" value="{{ $vouchers->masa_berlaku }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Merchant</label>
                    <select class="form-control" id="merchant_id" name="merchant_id">
                        @foreach ($merchants as $merchant)
                            <option value="{{ $merchant->id }}"
                                {{ $vouchers->merchant_id == $merchant->id ? 'selected' : '' }}>
                                {{ $merchant->nama_merchant }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
            </form>
        </div>
    </div>


    <!-- Content Row -->

    <div class="row">


    </div>



</div>
