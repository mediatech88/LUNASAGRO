@extends('layouts.master')
@section('title', 'Tempat Pelayanan')
@section('content')
    @if (session('status'))
        <div class="alert {{ session('alert') }} }}" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    {{-- <div class="card text-center mb-3">
        <div class="card-body">

        </div>
    </div> --}}
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data User /</span> Tempat Pelayanan</h4>

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
                                    <th>Korlap</th>
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
                                        <td>
                                            25
                                        </td>
                                        <td>
                                            {{-- <form action="/tempat-pelayanan" method="post">
                                                <button type="button" class="btn rounded-pill btn-icon btn-danger"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                                                    data-bs-html="true" title="" data-bs-original-title="Hapus Data">
                                                    <span class="tf-icons bx bx bx-trash"></span>
                                                </button>
                                                <a href="{{ url()->current() . '/' . $data->user_id . '/edit' }}"
                                                    role="button" class="btn rounded-pill btn-icon btn-primary"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                                                    data-bs-html="true" title="" data-bs-original-title="Edit Data">
                                                    <span class="tf-icons bx bx bx-edit"></span>
                                                </a> --}}

                                            <button href="#" role="button"
                                                class="btn rounded-pill btn-icon btn-primary d-inline"
                                                data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                                                data-bs-html="true" title="" data-bs-original-title="Edit Data">
                                                <span class="tf-icons bx bx bx-edit"></span>
                                            </button>
                                            @if (auth()->user()->id !== $data->id || auth()->user()->id !== 1)
                                                <form action="/tempat-pelayanan/{{ $data->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete') @csrf
                                                    <button type="submit" class="btn rounded-pill btn-icon btn-danger"
                                                        data-toggle="modal" data-target="#GSCCModal"
                                                        data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                        data-bs-placement="bottom" data-bs-html="true" title=""
                                                        data-bs-original-title="Hapus Data">
                                                        <span class="tf-icons bx bx bx-trash"></span>
                                                    </button>
                                                </form>
                                            @endif


                                        </td>

                                    </tr>
                                @endforeach
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="GSCCModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
