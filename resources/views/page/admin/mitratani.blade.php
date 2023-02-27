@extends('layouts.master')
@section('title', 'Mitra Tani')
@section('content')
    {{-- <div class="card text-center mb-3">
        <div class="card-body">

        </div>
    </div> --}}
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data User /</span> Mitra Tani</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="demo-inline-spacing mb-3">
                <button type="button" class="btn rounded-pill btn-success" data-bs-toggle="tooltip" data-bs-offset="0,4"
                    data-bs-placement="bottom" data-bs-html="true" title="" data-bs-original-title="Tambah Data"><span
                        class="tf-icons bx bx bx-plus"></span>Tambah
                    Data</button>
                <button type="button" class="btn rounded-pill btn-outline-warning" data-bs-toggle="tooltip"
                    data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true" title=""
                    data-bs-original-title="Export Data"><span class="tf-icons bx bx bx-export"></span></button>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive text-nowrap pb-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Alamat</th>
                                    <th>Koordinat Lahan</th>
                                    <th>Luas Lahan</th>
                                    <th>Elevasi</th>
                                    <th>Tim Ahli</th>
                                    <th>Korlap</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>1</td>
                                    <td>MT01</td>
                                    <td>Sri Rejeki</td>
                                    <td>Srirejeki@gmail.com</td>
                                    <td>082116162688</td>
                                    <td>Sidoarjo - Jawa Timur</td>
                                    <td>-7.00000,112.781788</td>
                                    <td>200 <strong>M<sup>2</sup></strong></td>
                                    <td>1270 <strong>Mdpl</strong></td>
                                    <td>TA01TP009</td>
                                    <td>KL01TP009</td>
                                    <td><button type="button" disabled
                                            class="btn rounded-pill btn-warning">Pending</button></td>
                                    <td>
                                        <button type="button" class="btn rounded-pill btn-icon btn-danger"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                                            data-bs-html="true" title="" data-bs-original-title="Hapus Data">
                                            <span class="tf-icons bx bx bx-trash"></span>
                                        </button>
                                        <button type="button" class="btn rounded-pill btn-icon btn-primary"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                                            data-bs-html="true" title="" data-bs-original-title="Edit Data">
                                            <span class="tf-icons bx bx bx-edit"></span>
                                        </button>
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
