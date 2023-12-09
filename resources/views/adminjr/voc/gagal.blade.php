@extends('adminjr.layouts.app')

@section('title', 'Superadmin - Voucher Belum Terklaim')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Voucher Gagal Terklaim</h1>
    <p class="mb-4">Berikut adalah daftar wajib pajak yang gagal mengklaim voucher.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Voucher Gagal Terklaim</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pemilik</th>
                            <th>Nopol Kendaraan</th>
                            <th>Nama Merchant</th>
                            <th>Alamat Merchant</th>
                            <th>Tanggal/Waktu Klaim</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chatime</td>
                            <td>Minuman</td>
                            <td>Surabaya</td>
                            <td>Tunjungan Plaza Surabaya Lt. 2</td>
                            <td>21/08/2023</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Detail</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Merchant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Nama
                                        Merchant</label>
                                    <input class="form-control mb-4" type="text" placeholder="Default input"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Bidang Usaha</label>
                                    <select class="custom-select" disabled>
                                        <option selected="selected">Makanan</option>
                                        <option value="1">Minuman</option>
                                        <option value="2">Transportasi</option>
                                        <option value="3">Penginapan</option>
                                        <option value="4">Salon dan Kecantikan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Kota/Kabupaten</label>
                                    <select class="custom-select" disabled>
                                        <option selected="selected">Surabaya</option>
                                        <option value="1">Probolinggo</option>
                                        <option value="2">Sidoarjo</option>
                                        <option value="3">Gresik</option>
                                        <option value="4">Bangkalan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Alamat</label>
                                    <input class="form-control mb-4" type="text" placeholder="Jl. Mawar 123"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="chatime@gmail.com" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
