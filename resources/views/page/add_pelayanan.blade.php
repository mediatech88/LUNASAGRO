@extends('layouts.master')
@section('title', 'Tambah Tempat Pelayanan')
@section('content')
    {{-- <div class="card text-center mb-3">
        <div class="card-body">

        </div>
    </div> --}}
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data User / Tempat Pelayanan /</span> Create</h4>

    <div class="row">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data Tempat Pelayanan</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/tempat-pelayanan">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="id">Refferal</label>
                            <div class="input-group input-group-merge">
                                <input name="reff" id="reff" type="text"
                                    class="form-control
                                    required id="basic-icon-default-fullname"
                                    readonly value="{{ $reff }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="id">ID</label>
                                <div class="input-group input-group-merge">
                                    <button type="button" disabled class="btn btn-primary">TP</button>
                                    <input name="code" id="code" type="text"
                                        class="form-control @error('code')
                                    is-invalid
                                @enderror""
                                        required id="basic-icon-default-fullname" value="{{ $id_tp }}">
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama Tempat Pelayanan</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input name="name" id="name" type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    required id="basic-icon-default-fullname" placeholder="Nama lengkap"
                                    value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                    placeholder="Alamat Email" aria-label="john.doe" required value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Phone</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input name="phone" id="phone" type="tel" id="basic-icon-default-phone"
                                    class="form-control @error('phone')
                                    is-invalid
                                @enderror
                                    phone-mask"
                                    placeholder="628XXXXXXXX" required value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Provinsi</label>
                            <select class="form-select" name="provinsi" id="provinsi" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach ($alamat as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kota/Kab</label>
                            <select class="form-select" name="kota" id="kota" required>
                                <option value="">Pilih Kota / Kab</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kecamatan</label>
                            <select class="form-select" name="kec" id="kec" aria-label="Default select example"
                                required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Desa/Kelurahan</label>
                            <select class="form-select" name="desa" id="desa" aria-label="Default select example"
                                required>
                                <option value="">Pilih Desa / Kelurahan</option>
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label" for="alamat_lain">Detail Alamat</label>
                            <div class="input-group input-group-merge">
                                <textarea name="alamat_lain" id="alamat_lain" type="text" class="form-control" id="basic-icon-default-fullname"
                                    rows="3"></textarea>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#provinsi').on('change', function() {
            var id_provinsi = $(this).val();
            // console.log(id_provinsi);
            if (id_provinsi) {
                $.ajax({
                    url: 'https://mediatech88.github.io/api-wilayah-indonesia/api/regencies/' +
                        id_provinsi + '.json',
                    type: 'GET',
                    data: {},
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);

                        if (data) {
                            $('#kota').empty();
                            $('#kec').empty();
                            $('#desa').empty();
                            $('#kota').append(
                                '<option value=""> Pilih Kota / Kab </option>');
                            $('#kec').append(
                                '<option value=""> Pilih Kecamatan </option>');
                            $('#desa').append(
                                '<option value=""> Pilih Desa / Kelurahan </option>');
                            $.each(data, function(key, kotakab) {
                                $('select[name="kota"]').append(
                                    '<option value="' + kotakab.id + '">' +
                                    kotakab.name + '</option>'
                                );

                            });

                        } else {
                            $('#kota').empty();
                        }
                    }
                });
            } else {
                $('#provinsi').empty();
            }

        });
        $('#kota').on('change', function() {
            var id_kota = $(this).val();
            // console.log(id_provinsi);
            if (id_kota) {
                $.ajax({
                    url: 'https://mediatech88.github.io/api-wilayah-indonesia/api/districts/' +
                        id_kota + '.json',
                    type: 'GET',
                    data: {},
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);

                        if (data) {
                            $('#kec').empty();
                            $('#desa').empty();
                            $('#kec').append(
                                '<option value=""> Pilih Kecamatan</option>');
                            $('#desa').append(
                                '<option value=""> Pilih Desa / Kelurahan </option>');
                            $.each(data, function(key, kecamatan) {
                                $('select[name="kec"]').append(
                                    '<option value="' + kecamatan.id + '">' +
                                    kecamatan.name + '</option>'
                                );

                            });

                        } else {
                            $('#kec').empty();
                        }
                    }
                });
            } else {
                $('#kota').empty();
            }

        });
        $('#kec').on('change', function() {
            var id_kec = $(this).val();
            // console.log(id_provinsi);
            if (id_kec) {
                $.ajax({
                    url: 'https://mediatech88.github.io/api-wilayah-indonesia/api/villages/' +
                        id_kec + '.json',
                    type: 'GET',
                    data: {},
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);

                        if (data) {
                            $('#desa').empty();
                            $('#desa').append(
                                '<option value=""> Pilih Desa / Kelurahan </option>');
                            $.each(data, function(key, desa) {
                                $('select[name="desa"]').append(
                                    '<option value="' + desa.id + '">' +
                                    desa.name + '</option>'
                                );

                            });

                        } else {
                            $('#desa').empty();
                        }
                    }
                });
            } else {
                $('#kec').empty();
            }

        });
    });
</script>
