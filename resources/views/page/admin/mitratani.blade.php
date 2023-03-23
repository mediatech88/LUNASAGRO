@extends('layouts.master')
@section('title', 'Mitra Tani')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (session('gagal'))
        <div class="alert alert-danger" role="alert">
            {{ session('gagal') }}
        </div>
    @endif
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data User /</span> Mitra Tani</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="demo-inline-spacing mb-3">
                <a href="{{ url()->current() . '/create' }}" class="btn btn rounded-pill btn-success"
                    role="button"data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                    data-bs-html="true" title="" data-bs-original-title="Tambah Data"><span
                        class="tf-icons bx bx bx-plus"></span>Tambah
                    Data</a>
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
                                @php
                                    $numb = 1;
                                @endphp
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $numb++ }}</td>
                                        <td>{{ $data->code }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->desa }} {{ $data->kecamatan }} {{ $data->kota }}</td>
                                        <td>{{ $data->koordinat_lat }}, {{ $data->koordinat_long }}</td>
                                        <td>
                                            {{ $data->luas_lahan }} <b>M</b><sup>2</sup>
                                        </td>
                                        <td>
                                            {{ $data->elevasi }} <b>Mdpl</b>
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            {{ $data->korlap_id }}
                                        </td>
                                        <td>
                                            @if ($data->status === 1)
                                                <button type="button" class="btn rounded-pill btn-success">Sukses</button>
                                            @elseif ($data->status === 2)
                                                <button type="button" class="btn rounded-pill btn-warning">Pending</button>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn rounded-pill btn-icon btn-primary"
                                                data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                                                data-bs-html="true" title="" data-bs-original-title="Edit Data">
                                                <span class="tf-icons bx bx bx-edit"></span>
                                            </button>
                                            <form action="/mitra-tani/{{ $data->user_id }}" method="post"
                                                class="d-inline">
                                                @method('delete') @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus {{ $data->name }}?')"
                                                    class="btn rounded-pill btn-icon btn-danger" data-toggle="modal"
                                                    data-target="#GSCCModal" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                    data-bs-placement="bottom" data-bs-html="true" title=""
                                                    data-bs-original-title="Hapus Data">
                                                    <span class="tf-icons bx bx bx-trash"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
