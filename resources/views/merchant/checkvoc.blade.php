@extends('merchant.layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <h1 class="header-title">Input Kode Voucher</h1>

        @if(session('error'))
        <div id="error" data-error="{{ session('error') }}" class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif


        <form action="{{ route('merchant.checkvocStatus') }}" method="POST">
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
<script>
    var successMessage = "{{ session('success') ? session('success') : '' }}";
    var errorMessage = "{{ session('error') ? session('error') : '' }}";
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (successMessage) {
            alert(successMessage);
        } else if (errorMessage) {
            alert(errorMessage);
        }
    });
</script>

@endsection