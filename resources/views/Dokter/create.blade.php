@extends('layout.app')

@section('content')
    <h1 class ="h3 mb-2 text-gray-800"> REGISTRASI AKUN DOKTER</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Input Username -->
                <div class="form-group row mb-3">
                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('NIP Dokter') }}</label>
                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autocomplete="username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- Input Nama -->
                <div class="form-group row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Dokter') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Input Email -->
                <div class="form-group row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Input Password -->
                <div class="form-group row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Input Konfirmasi Password -->
                <div class="form-group row mb-3">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <!-- Input Alamat dan Nomor HP -->
                <div class="form-group row mb-3">
                    <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                    <div class="col-md-6">
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="no_hp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP') }}</label>
                    <div class="col-md-6">
                        <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                            name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp">
                        @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Input Status (Hidden) -->
                <input type="hidden" value="dokter" name="status">

                <!-- Tombol Submit -->
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-info">
                            {{ __('Daftar Dokter') }}
                        </button>
                        <a href="/dokter" class="btn btn-info">BACK</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection





{{-- <form action="{{ route('dokter.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="nip_dokter">Nip Dokter</label>
                        <input type="text" name="nip_dokter" class="form-control" value="{{ old('nip_dokter') }}" autofocus />
                        <span class="text-danger">{{ $errors->first('nip_dokter') }}</span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="nama_dokter">Nama Dokter</label>
                        <input type="text" name="nama_dokter" class="form-control" value="{{ old('nama_dokter') }}" />
                        <span class="text-danger">{{ $errors->first('nama_dokter') }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" />
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="nomor_hp">Nomor HP</label>
                        <input type="text" name="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}" />
                        <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                    </div>
                </div>

                <div class="form-group mt-2 d-flex">
                    <button type="submit" class="btn btn-info mr-2">SIMPAN</button>
                    <a href="{{ route('dokter.index') }}" class="btn btn-info">BACK</a>
                </div>
            </form> --}}
