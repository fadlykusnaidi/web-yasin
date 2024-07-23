@extends('layout.app')
@section('title', 'Resep Obat')
@section('content')

<div class="card-body">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Resep</th>
                    <th>Keterangan Obat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php ($no=1)
                @foreach ($rekammedis as $rekam)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ isset($pasien[$rekam->nomorRekamMedis->id_pasien]) ? $pasien[$rekam->nomorRekamMedis->id_pasien] : 'Nama Pasien Tidak Tersedia' }}</td>
                    
                        <td>{{ \Carbon\Carbon::parse($rekam->kunjungan)->format('d-m-Y') }}</td>
                        <td class="text-left table-obat">
                            <ul>
                                @foreach ($rekam->resepObat as $resep)
                                    @if ($resep->obat)
                                        <li>{{ $resep->obat->Nama }} - {{ $resep->keterangan }}</li>
                                    @else
                                        <li>Keterangan obat tidak tersedia</li>
                                    @endif
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @if($rekam->resepObat->where('status', '!=', 'selesai')->isNotEmpty())
                                <form action="{{ route('resepobat.selesai', $rekam->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                </form>
                            @else
                                <span class="badge badge-success">Selesai</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
