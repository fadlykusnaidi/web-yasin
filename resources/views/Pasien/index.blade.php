@extends('layout.app')
@section('title', 'Pasien')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Pasien</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/pasien/create" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Tambah Pasien</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No Hp</th>
                            <th>Status Pasien</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pasien as $row)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->Nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->Tanggal_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $row->Alamat }}</td>
                                <td>{{ $row->jk }}</td>
                                <td>{{ $row->No_Hp }}</td>
                                <td>{{ $row->Bpjs }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $row->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('pasien.destroy', $row) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin untuk menghapus data pasien?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('updatePasien') }}" method="post">
                                        @method('post')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $row->id }}">
                                                    Edit Pasien
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="{{ $row->id }}" />
                                                <div class="mb-3">
                                                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                                    <input type="text" name="nama_pasien" class="form-control"
                                                        value="{{ $row->Nama }}" />
                                                    <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" class="form-control"
                                                        value="{{ $row->Tanggal_Lahir }}" />
                                                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" name="alamat" class="form-control"
                                                        value="{{ $row->Alamat }}" />
                                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <div class="form-check">
                                                        <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                            value="Laki-laki" id="lk{{ $row->id }}"
                                                            {{ $row->jk == 'Laki-laki' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="lk{{ $row->id }}">Laki-laki</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                            value="Perempuan" id="pr{{ $row->id }}"
                                                            {{ $row->jk == 'Perempuan' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="pr{{ $row->id }}">Perempuan</label>
                                                    </div>
                                                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                                                    <input type="text" name="nomor_hp" class="form-control"
                                                        value="{{ $row->No_Hp }}" />
                                                    <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status Pasien</label>
                                                    <div class="form-check">
                                                        <input type="radio" name="status" class="form-check-input"
                                                            value="bpjs" id="b{{ $row->id }}"
                                                            {{ $row->Bpjs == 'bpjs' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="b{{ $row->id }}">Pasien
                                                            BPJS</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="status" class="form-check-input"
                                                            value="non bpjs" id="nb{{ $row->id }}"
                                                            {{ $row->Bpjs == 'non bpjs' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="nb{{ $row->id }}">Pasien Non BPJS</label>
                                                    </div>
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
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
