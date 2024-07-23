<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class ResepObatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rekammedis = RekamMedis::with(['statusObat.status', 'nomorRekamMedis'])
        
        ->whereHas('statusObat', function($query) {
            $query->where('status', 0);
        })   
        ->get();
        // Ambil data pasien untuk digunakan di view
        $pasien = Pasien::pluck('Nama', 'id')->toArray();

        // dd($rekammedis);
        return view('resepobat.index', compact('rekammedis', 'user', 'pasien'));
    }

    public function selesai($id)
    {
        // Mengubah status resep obat menjadi 'selesai' berdasarkan id rekam medis
        ResepObat::where('id_rm', $id)->update(['status' => '1']);
        return redirect()->back()->with('success', 'Resep obat berhasil diselesaikan.');
    }
}
