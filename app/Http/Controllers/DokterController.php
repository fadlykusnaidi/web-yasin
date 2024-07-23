<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dokter = Dokter::all();
        return view('dokter.index', compact('dokter', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('dokter.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip_dokter' => 'required|string|max:20|unique:dokters,nip_dokter',
            'nama_dokter' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:15|regex:/^\d{10,15}$/',
            'id_user' => 'required|integer',
        ]);

        Dokter::create([
            'Nip_Dokter' => $request->input('nip_dokter'),
            'Nama' => $request->input('nama_dokter'),
            'Alamat' => $request->input('alamat'),
            'No_Hp' => $request->input('nomor_hp'),
            'id_user' => $request->input('id_user'),
        ]);

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        Dokter::where('id', $request->input('id'))
            ->update([
                'Nip_Dokter' => $request->input('nip_dokter'),
                'Nama' => $request->input('nama_dokter'),
                'Alamat' => $request->input('alamat'),
                'No_Hp' => $request->input('nomor_hp'),
            ]);
        return redirect('/dokter')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $idUser = $dokter->id_user;
        
        User::where('id',$idUser)->delete();
        $dokter->delete();
        return redirect('/dokter')->with('success', 'Data dokter berhasil dihapus.');
    }
}
