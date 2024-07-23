<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pasien = Pasien::all();
        return view('pasien.index', compact('pasien', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('pasien.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required|numeric',
            'status' => 'required',
        ], [
            'required' => ':attribute harus diisi.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'numeric' => ':attribute harus berupa angka.',
        ]);

        Pasien::create([
            'Nama' => $request->input('nama_pasien'),
            'Tanggal_lahir' => $request->input('tanggal_lahir'),
            'Alamat' => $request->input('alamat'),
            'jk' => $request->input('jenis_kelamin'),
            'No_Hp' => $request->input('nomor_hp'),
            'Bpjs' => $request->input('status'),
        ]);

        return redirect('/pasien')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $rules = [
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'nomor_hp' => 'required|string|max:15',
            'status' => 'required|string'
        ];

        $validatedData = $request->validate($rules);

        $pasien = Pasien::find($request->id);
        $pasien->Nama = $validatedData['nama_pasien'];
        $pasien->Alamat = $validatedData['alamat'];
        $pasien->jk = $validatedData['jenis_kelamin'];
        $pasien->No_Hp = $validatedData['nomor_hp'];
        $pasien->Bpjs = $validatedData['status'];

        // Only update tanggal_lahir if it is present in the request and not empty
        if ($request->filled('tanggal_lahir')) {
            $pasien->Tanggal_Lahir = $request->input('tanggal_lahir');
        }

        $pasien->save();

        return redirect()->back()->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus');
    }
}
