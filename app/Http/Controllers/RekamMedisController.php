<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\jumlah_rekammedis;
use App\Models\nomor_rekammedis;
use App\Models\Obat;
use App\Models\Resep;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class RekamMedisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kunjungan = RekamMedis::selectRaw('MAX(kunjungan) as latest_kunjungan, Rm_id')->groupBy('Rm_id')->pluck('latest_kunjungan', 'Rm_id')->toArray();
        $rekammedis = RekamMedis::all();
        $nomor = nomor_rekammedis::all();
        // $nomor=$nomor_rekammedis->map->only(['nomor_rm', 'id_pasien'])->values();
        // $nomor = nomor_rekammedis::get()->toArray();
        $pasien = Pasien::pluck('Nama', 'id')->toArray();
        // dd($nomor);

        //  dd($obat);
        return view('rekammedis.index', compact('rekammedis', 'pasien',  'nomor', 'kunjungan', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $nomor_rm = nomor_rekammedis::get('id_pasien')->pluck('id_pasien')->toArray();
        $pasien = Pasien::whereNotIN('id', $nomor_rm)->get();
        $sum = jumlah_rekammedis::select('sum')->where('id', 1)->get()->toArray();
        $total = $sum[0]['sum'] + 1;


        return view('rekammedis.create', compact('pasien', 'total', 'user'));
    }

    public function detail(Request $request, $id)
    {
        $user = Auth::user();
        $dokter = Dokter::all();
        $obatt = Obat::all();
        $dokterr = Dokter::pluck('Nama', 'id_user')->toArray();
        $noRm = nomor_rekammedis::find($id)->toArray();
        $pasien = Pasien::find($noRm['id_pasien'])->toArray();
        $rm = RekamMedis::where('Rm_id', $noRm['id'])->get();
        $rms = RekamMedis::where('Rm_id', $noRm['id'])->get('id')->pluck('id')->toArray();
        $obat = Resep::whereIn('id_rm', $rms)->with('obat')->get(['id_rm', 'id_obat', 'keterangan'])->toArray();

        $sum = jumlah_rekammedis::select('sum')->where('id', 1)->get()->toArray();
        $total = $sum[0]['sum'] + 1;

        return view('rekammedis.detail_rm', compact('pasien', 'noRm', 'obat', 'obatt', 'dokter', 'rm', 'id', 'user', 'dokterr'));
    }
    public function tambah_rm(Request $request)
    {
        $user = Auth::user()->id;
        $this->validate($request, [
            'keluhan' => 'required',
            'nama_obat' => 'required'

        ]);


        RekamMedis::create([
            'Rm_id' => $request->rm_id,
            'Keluhan' => $request->keluhan,
            'id_dokter' => $user,
            'kunjungan' => Carbon::parse($request->tanggal_kunjungan),

        ]);

        $idRM = RekamMedis::max('id');
        $idObat = $request->nama_obat;
        $keterangan = $request->keterangan;

        if ($idObat != null) {
            for ($count = 0; $count < count($idObat); $count++)
                Resep::insert(
                    [
                        'id_obat'  => $idObat["$count"],
                        'id_rm' => $idRM,
                        'keterangan' => $keterangan["$count"],
                    ]
                );
            ResepObat::create(
                [
                    'id_rm' => $idRM,
                    'status' => false,
                ]
            );
        };

        return redirect('/rekammedis/detail_rm/' . $request->rm_id);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_rm' => 'required',
            'pasienId' => 'required',


        ]);

        nomor_rekammedis::create([
            'id_pasien' => $request->pasienId,
            'nomor_rm' => $request->nomor_rm,
        ]);

        jumlah_rekammedis::where('id', 1)->increment('sum', 1);

        return redirect('/rekammedis');
    }

    public function update(Request $request)
    {
        RekamMedis::where('id', $request->input('id'))
            ->update([
                'Nama_Pasien' => $request->input('nama_pasien'),
                'Keluhan' => $request->input('keluhan'),
                'Nama_Dokter' => $request->input('nama_doketr'),
                'Obat' => $request->input('nama_obat'),
            ]);
        return redirect('/rekammedis');
    }

    public function destroy(RekamMedis $rekammedis)
    {
        $Resep = Resep::where('id_rm', $rekammedis->id)->delete();
        $rekammedis->delete();
        return redirect()->back();
    }

    public function destroyNoRM(nomor_rekammedis $noRM)
    {
        $noRM->delete();
        return redirect()->back();
    }
}
