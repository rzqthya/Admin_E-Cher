@extends('layouts.merchant.app')

@section('content')
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-gift"></i> Voucher Terklaim</div>
                            <h2>{{ $totalTerklaim }}</h2>
                        </div>
                        <canvas id="seolinechart1" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-ticket"></i> Voucher Belum Terklaim
                            </div>
                            <h2>{{ $totalBelumTerklaim }}</h2>
                        </div>
                        <canvas id="seolinechart2" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
