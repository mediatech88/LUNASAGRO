@extends('layouts.master')
@section('title', 'Tanaman')
@section('content')
    {{-- <div class="card text-center mb-3">
        <div class="card-body">

        </div>
    </div> --}}
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Evaluasi /</span> Tanaman</h4>

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
                                    <th>Nomor Pohon</th>
                                    <th>Komoditas</th>
                                    <th>Varietas</th>
                                    <th>Tanggal Tanam</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>1</td>
                                    <td>MT02AH01</td>
                                    <td>01</td>
                                    <td>Alpukat</td>
                                    <td>Hass</td>
                                    <td>25/02/2023</td>
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
