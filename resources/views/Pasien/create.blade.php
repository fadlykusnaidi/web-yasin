@extends('layout.app')
@section('title', 'Tambah Pasien')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('simpanPasien') }}" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" value="{{ old('nama_pasien') }}" autofocus />
                        <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="start">Tanggal Lahir :</label>
                        <input class="form-control" type="date" id="start" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" />
                        <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" autofocus />
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="jj">Jenis Kelamin</label>
                        <div class="form-check ml-3">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-check-input" id="lk" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="lk">Laki-laki</label>
                        </div>
                        <div class="form-check ml-3">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-check-input" id="pr" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="pr">Perempuan</label>
                        </div>
                        <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="nomor_hp">Nomor HP</label>
                        <input type="text" name="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}" autofocus />
                        <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Bpjs">STATUS PASIEN</label>
                        <div class="form-check ml-3">
                            <input type="radio" name="status" value="Bpjs" class="form-check-input" id="b" {{ old('status') == 'Bpjs' ? 'checked' : '' }}>
                            <label class="form-check-label" for="b">PASIEN BPJS</label>
                        </div>
                        <div class="form-check ml-3">
                            <input type="radio" name="status" value="Non Bpjs" class="form-check-input" id="nb" {{ old('status') == 'Non Bpjs' ? 'checked' : '' }}>
                            <label class="form-check-label" for="nb">PASIEN NON BPJS</label>
                        </div>
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    </div>
                </div>
                <div class="form-group mt-2 d-flex">
                    <button type="submit" class="btn btn-info mr-2">SIMPAN</button>
                    <a href="/pasien" class="btn btn-info">BACK</a>
                </div>
            </form>
        </div>
    </div>
@endsection
