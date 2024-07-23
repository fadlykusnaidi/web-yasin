<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\jumlah_rekammedis;
use App\Models\nomor_rekammedis;
use App\Models\Obat;
use App\Models\Resep;

class PDFController extends Controller
{
    public function generatePDF(Request $request, $id)
    {
        $dokter = Dokter::all();
        $obatt = Obat::all();
        $dokterr = Dokter::pluck('Nama', 'id')->toArray();
        $noRm = nomor_rekammedis::find($id)->toArray();
        $pasien = Pasien::find($noRm['id_pasien'])->toArray();
        $rm = RekamMedis::where('Rm_id', $noRm['id'])->get();
        $rms = RekamMedis::where('Rm_id', $noRm['id'])->get('id')->pluck('id')->toArray();
        $obat = Resep::whereIN('id_rm', $rms)->with('obat')->get()->toArray();
        // Gunakan nama pasien dalam nama file
        $namaPasien = $pasien['Nama']; // Asumsikan 'nama' adalah field untuk nama pasien
        $nomorRekamMedis = $noRm['nomor_rm']; // Asumsikan 'nomor_rm' adalah field untuk nomor rekam medis
        $filename = $nomorRekamMedis . '_' . $namaPasien . '_document.pdf';
        $data = compact('dokter', 'obatt', 'noRm', 'pasien', 'rm', 'rms', 'obat','dokterr');
        $pdf = Pdf::loadView('RekamMedis.document', $data);
        return $pdf->download($filename);
    }
}
