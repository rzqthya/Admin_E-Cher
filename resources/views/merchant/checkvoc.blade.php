@extends('merchant.layouts.app')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h1 class="header-title">Input Kode Voucher</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group row ml-2 align-items-center">
                    <label for="voucher_code" class="col-form-label font-weight-bold font-size-18">Kode Voucher:</label>
                    <div class="col-md-6">
                        <input type="text" id="voucher_code" name="voucher_code" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <div class="submit-btn-area">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
