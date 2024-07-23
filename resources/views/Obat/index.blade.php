@extends('layout.app')
@section('title', 'Obat')
@section('content')
    <!-- DataTales Example -->
    <h1 class="h3 mb-2 text-gray-800"> Obat</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/obat/create" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah Obat</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama_Obat</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($obat as $row)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->Nama }}</td>
                                <td>{{ $row->Keterangan }}</td>
                                <td>
                                    <button type="button" class="btn  btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $row->id }}">
                                        <i class="fas fa-edit"></i>Edit
                                    </button>
                                    <form action="{{ route('deleteObat', $row) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin untuk menghapus data ?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn  btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('updateObat', $row->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $row->id }}">
                                                    Edit Obat</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <input type="text" name="id" class="form-control"
                                                        value="{{ $row->id }}" hidden />
                                                    <div class="col-md-6 form-group">
                                                        <label for="nama_obat">Nama Obat</label>
                                                        <input type="text" name="nama_obat" class="form-control"
                                                            value="{{ $row->Nama }}" required />
                                                        @if ($errors->has('nama_obat'))
                                                            <span class="text-danger">{{ $errors->first('nama_obat') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6 form-group">
                                                        <label for="keterangan">Keterangan</label>
                                                        <input type="text" name="keterangan" class="form-control"
                                                            value="{{ $row->Keterangan }}" required />
                                                        @if ($errors->has('keterangan'))
                                                            <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
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
