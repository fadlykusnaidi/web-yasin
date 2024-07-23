@extends('layout.app')
@section('title', 'Rekammedis')
@section('content')
    <!-- DataTales Example -->
    <h1 class="h3 mb-2 text-gray-800"> Rekam Medis</h1>
    <div class="card shadow mb-4">
        @if ($user->status == 'admin')
            <div class="card-header py-3">
                <a href="/rekammedis/create" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>DAFTAR PASIEN</a>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Nomor Rekam Medis</th>
                            <th>Nama Pasien</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($nomor as $row)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (isset($kunjungan[$row->id]))
                                        {{ \Carbon\Carbon::parse($kunjungan[$row->id])->format('d-m-Y') }}
                                    @else
                                        <!-- Tampilkan pesan jika tanggal kunjungan tidak ada -->
                                        Tidak ada tanggal kunjungan
                                    @endif
                                </td>
                                <td>{{ $row->nomor_rm }}</td>
                                <td>{{ $pasien[$row->id_pasien] }}</td>


                                <td>
                                    <a href="/rekammedis/detail_rm/{{ $row->id }}" type="button"
                                        class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i>Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
