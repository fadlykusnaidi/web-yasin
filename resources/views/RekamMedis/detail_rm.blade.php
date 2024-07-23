    @extends('layout.app')
    @section('title', 'rekammedis')
    @section('content')

        <style>
            .table-obat ul {
                padding-left: 20px;
                margin: 0;
            }

            .table-obat li {
                list-style-type: disc;
                margin-bottom: 5px;
            }
        </style>


        <div class="card col-md-6">
            <div class="row">
                <div class="col-7 d-flex flex-row">
                    <div class="col-md-6">
                        <h6> No. Rekam Medis </h6>
                    </div>
                    <div class="col-md-1">
                        <h6> : </h6>
                    </div>
                    <h6> {{ $noRm['nomor_rm'] }}</h6>
                </div>
                <div class="col-7 d-flex flex-row">
                    <div class="col-md-6">
                        <h6> Nama Pasien </h6>
                    </div>
                    <div class="col-md-1">
                        <h6> : </h6>
                    </div>
                    <h6> {{ $pasien['Nama'] }}</h6>
                </div>
                <div class="col-7 d-flex flex-row">
                    <div class="col-md-6">
                        <h6> Tanggal Lahir </h6>
                    </div>
                    <div class="col-md-1">
                        <h6> : </h6>
                    </div>
                    <h6>{{ \Carbon\Carbon::parse($pasien['Tanggal_lahir'])->format('d-m-Y') }}</h6>
                </div>

                <div class="col-7 d-flex flex-row">
                    <div class="col-md-6">
                        <h6> Alamat </h6>
                    </div>
                    <div class="col-md-1">
                        <h6> : </h6>
                    </div>
                    <h6> {{ $pasien['Alamat'] }}</h6>
                </div>
                <div class="col-7 d-flex flex-row">
                    <div class="col-md-6">
                        <h6> Jenis Kelamin </h6>
                    </div>
                    <div class="col-md-1">
                        <h6> : </h6>
                    </div>
                    <h6> {{ $pasien['jk'] }}</h6>
                </div>
                <div class="col-7 d-flex flex-row">
                    <div class="col-md-6">
                        <h6> Nomor Hp </h6>
                    </div>
                    <div class="col-md-1">
                        <h6> : </h6>
                    </div>
                    <h6> {{ $pasien['No_Hp'] }}</h6>
                </div>
                <div class="col-7 d-flex flex-row">
                    <div class="col-md-6">
                        <h6> Status </h6>
                    </div>
                    <div class="col-md-1">
                        <h6> : </h6>
                    </div>
                    <h6> {{ $pasien['Bpjs'] }}</h6>
                </div>
                @if ($user->status == 'admin')
                    <div class="col-12 d-flex justify-content-end">
                        <a href="/cetak/rekammedis/{{ $id }}" type="button" class="btn  btn-success btn-sm">
                            Cetak Rekam Medis Pasien</a>
                    </div>
                @endif
            </div>

        </div>



        <!-- DataTales Example -->
        <h1 class ="h3 mb-2 text-gray-800"> Detail Rekam Medis</h1>

        <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
                @if ($user->status == 'dokter')
                    <button type="button" class="btn  btn-info btn-sm me-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i>Tambah Rekam Medis
                    </button>
                @endif
                <a href="/rekammedis"class="btn btn-info">Back</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class= "text-center">
                            <th>No</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Keluhan</th>
                            <th>Nama Dokter</th>
                            <th>Obat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($rm as $row)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->kunjungan)->format('d-m-Y') }}</td>
                                <td>{{ $row->Keluhan }}</td>
                                <td>{{ $dokterr[$row->id_dokter] }}</td>
                                <td class="text-left table-obat">
                                    <ul>
                                        @for ($i = 0; $i < count($obat); $i++)
                                            @if ($obat[$i]['id_rm'] == $row->id)
                                                <li>{{ $obat[$i]['obat']['Nama'] }} - {{ $obat[$i]['keterangan'] }}</li>
                                            @endif
                                        @endfor
                                    </ul>
                                </td>
                                <td>
                                    <form action="{{ route('rekammedis.destroy', $row) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin untuk menghapus data ?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>



        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tambah_rm') }}" method="post">
            @csrf
            <div class="modal-content mx-3">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Tambah Rekam Medis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="rm_id" class="form-control" value="{{ $noRm['id'] }}" hidden />
                    <div class="row mb-3">
                        <div class="col-md-6 form-group ">
                            <label for="keluhan">Keluhan</label>
                            <input type="text" name="keluhan" class="form-control" value="{{ old('keluhan') }}" autofocus />
                            <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 form-group">
                            <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                            <input type="date" name="tanggal_kunjungan" class="form-control" required />
                            <span class="text-danger">{{ $errors->first('tanggal_kunjungan') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 my-0">
                            <div class="mb-0">
                                <input type="text" class="form-control" id="obat" placeholder="cari berdasarkan Nama Obat">
                            </div>
                        </div>
                        <div id="daftarobat" class="col-xl-12 col-lg-12 my-0">
                            <table class="table table-striped mx-0">
                                <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="checkAll" name="checkAll"></th>
                                        <th scope="col">Nama Obat</th>
                                        <th scope="col">Dosis Obat</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($obatt as $obatlist)
                                        <tr>
                                            <td><input type="checkbox" id="daftarobat{{ $obatlist->id }}" name="nama_obat[]" value="{{ $obatlist->id }}" onclick="toggleInput({{ $obatlist->id }})"></td>
                                            <td>{{ $obatlist->Nama }}</td>
                                            <td><input type="text" id="dosisobat{{ $obatlist->id }}" name="keterangan[]" style="display: none;" disabled></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>


        <script>
            $(document).ready(function() {
                $("#obat").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });

            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            function toggleInput(obatId) {
                var checkbox = document.getElementById('daftarobat' + obatId);
                var input = document.getElementById('dosisobat' + obatId);
                if (checkbox.checked) {
                    input.style.display = 'block';
                    input.removeAttribute("disabled")
                } else {
                    input.style.display = 'none';
                    input.setAttribute("disabled", "disabled")
                }
            }
        </script>


    @endsection
