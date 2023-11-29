@extends('layouts.merchant.app')

@section('content')
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">Voucher Berhasil Terklaim</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">Nama Pemilik</th>
                                            <th scope="col">No Polisi</th>
                                            <th scope="col">Lokasi Bayar</th>
                                            <th scope="col">Tanggal/Waktu Klaim</th>
                                            <th scope="col">Verified</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formulirs as $formulir)
                                            <tr>
                                                <td>{{ $formulir->nama_user }}</td>
                                                <td>{{ $formulir->nopol }}</td>
                                                <td>{{ $formulir->wilayah->wilayah_samsat }}</td>
                                                <td>{{ $formulir->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    @if ($formulir->status_klaim == true)
                                                        Sudah Verified
                                                    @else
                                                        Belum Verified
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($formulir->status_klaim == false)
                                                        <!-- Form untuk "approve" -->
                                                        <form
                                                            action="{{ route('approve.formulir', ['id' => $formulir->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-success">Approve</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <!-- Tampilan ketika formulir telah diapprove -->
                                                        <button class="btn btn-danger" disabled>Approved</button>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--Modal Lihat-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Foto STNK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('assets/auth/images/author/avatar.png') }}" alt="foto STNK">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
