@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('simpanObat') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" value="{{ old('nama_obat') }}" required />
                        @if ($errors->has('nama_obat'))
                            <span class="text-danger form-control">{{ $errors->first('nama_obat') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required />
                        @if ($errors->has('keterangan'))
                            <span class="text-danger form-control">{{ $errors->first('keterangan') }}</span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group mt-2 d-flex">
                    <button type="submit" class="btn btn-info mr-2">SIMPAN</button>
                    <a href="/obat" class="btn btn-info">BACK</a>
                </div>
            </form>
        </div>
    </div>  
@endsection
