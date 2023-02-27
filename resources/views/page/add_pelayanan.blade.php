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
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data Tempat Pelayanan</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama Tempat Pelayanan</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input name="nama" id="nama" type="text" class="form-control" required
                                    id="basic-icon-default-fullname" placeholder="Nama lengkap" aria-label="John Doe">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Alamat Email" aria-label="john.doe" required>
                                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Phone</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input name="phone" id="phone" type="tel" id="basic-icon-default-phone"
                                    class="form-control phone-mask" placeholder="628XXXXXXXX" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Provinsi</label>
                            <select class="form-select" name="provinsi" id="provinsi" required>
                                <option selected="NULL">Pilih Provinsi</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kota/Kab</label>
                            <select class="form-select" name="kota" id="kota" required>
                                <option selected="">Pilih Kota / Kab</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kecamatan</label>
                            <select class="form-select" name="kec" id="kec" aria-label="Default select example">
                                <option selected="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Desa/Kelurahan</label>
                            <select class="form-select" name="desa" id="desa" aria-label="Default select example">
                                <option selected="">Pilih Desa / Kelurahan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
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
