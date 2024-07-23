@extends('layout.app')
@section('title', 'dokter')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- DataTales Example -->
    
<h1 class ="h3 mb-2 text-gray-800"> DOKTER</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/dokter/create" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah Dokter</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class= "text-center">
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($dokter as $row)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->Nip_Dokter }}</td>
                                <td>{{ $row->Nama }}</td>
                                <td>{{ $row->Alamat }}</td>
                                <td>{{ $row->No_Hp }}</td>
                                <td>
                                    <button type="button" class="btn  btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $row->id }}">
                                        <i class="fas fa-edit"></i>Edit
                                    </button>
                                    <form action="{{ route('dokter.destroy', $row) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin untuk menghapus data dokter?')">
                                        @method('delete')
                                        @csrf
                                        <button class = "btn  btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('updateDokter') }}" method="post">
                                        @method('post')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $row->id }}">
                                                    Edit Dokter</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="col-md-6 form-group ">
                                                <label for="nip_dokter">NIP</label>
                                                <input type="text" name="nip_dokter" class="form-control"
                                                    value="{{ $row->Nip_Dokter }}" autofocus />
                                                <span class="text-danger">{{ $errors->first('nip_dokter') }}</span>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <input type="text" name="id" class="form-control"
                                                        value="{{ $row->id }}" hidden />
                                                    <div class="col-md-6 form-group ">
                                                        <label for="nama_dokter">Nama Dokter</label>
                                                        <input type="text" name="nama_dokter" class="form-control"
                                                            value="{{ $row->Nama }}" autofocus />
                                                        <span
                                                            class="text-danger">{{ $errors->first('nama_dokter') }}</span>
                                                    </div>
                                                    <div class="col-md-6 form-group ">
                                                        <label for="alamat">Alamat</label>
                                                        <input type="text" name="alamat" class="form-control"
                                                            value="{{ $row->Alamat }}" autofocus />
                                                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-group ">
                                                    <label for="nomor_hp">Nomor HP</label>
                                                    <input type="text" name="nomor_hp" class="form-control"
                                                        value="{{ $row->No_Hp }}" autofocus />
                                                    <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
