@extends('merchant.layouts.app')

@section('content')
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-ticket"></i>Jumlah Voucher</div>
                            <div class="seofct-icon" style="font-size: 2em;">{{ $countVoc }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-gift"></i> Voucher Terklaim (Active) </div>
                            {{-- <div class="seofct-icon" style="font-size: 2em;">{{ $totalVoc }}</div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-ticket"></i> Voucher Teklaim (Used)</div>
                            <div class="seofct-icon" style="font-size: 2em;">{{ $countFormulirs }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
