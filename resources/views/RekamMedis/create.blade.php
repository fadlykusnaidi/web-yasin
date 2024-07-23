@extends('layout.app')
@section('title', 'Tambah Rekammedis')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('simpanrekammedis') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 form-group ">
                        <label for="nomor_rm">No. Rekam Medis</label>
                        <input type="text" name="nomor_rm" class="form-control" value="RM{{ sprintf('%03d', $total) }}"
                            readonly />
                        <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 form-group ">
                        <label for="pasienId">Nama Pasien</label>
                        <select class="form-select" aria-label="Default select example" name="pasienId">
                            <option selected>Nama Pasien</option>

                            @foreach ($pasien as $pasienlist)
                                <option value="{{ $pasienlist->id }}">{{ $pasienlist->Nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               
                
               
               
                {{-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" aria-label="Default select example" name="nama_obat"> --}}

                <div class="form-group mt-2 d-flex">
                    <button type="submit" class="btn btn-info mr-2">SIMPAN</button>
                    <a href="/rekammedis "class="btn btn-info">BACK</a>
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
            } else {
                input.style.display = 'none';
            }
        }
    </script>
@endsection
