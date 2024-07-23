<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $obat = Obat::all();
        return view('obat.index', compact('obat', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('obat.create', compact('user'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_obat' => 'required|string|max:255',
        'keterangan' => 'nullable|string|max:255',
    ], [
        'nama_obat.required' => 'Nama obat harus diisi.',
        'nama_obat.string' => 'Nama obat harus berupa teks.',
        'nama_obat.max' => 'Nama obat tidak boleh lebih dari 255 karakter.',
        'keterangan.string' => 'Keterangan harus berupa teks.',
        'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter.',
    ]);

    Obat::create([
        'Nama' => $request->input('nama_obat'),
        'Keterangan' => $request->input('keterangan'),
    ]);

    return redirect('/obat')->with('success', 'Obat berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_obat' => 'required|string|max:255',
        'keterangan' => 'nullable|string|max:255',
    ], [
        'nama_obat.required' => 'Nama obat harus diisi.',
        'nama_obat.string' => 'Nama obat harus berupa teks.',
        'nama_obat.max' => 'Nama obat tidak boleh lebih dari 255 karakter.',
        'keterangan.string' => 'Keterangan harus berupa teks.',
        'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter.',
    ]);

    Obat::where('id', $id)->update([
        'Nama' => $request->input('nama_obat'),
        'Keterangan' => $request->input('keterangan'),
    ]);

    return redirect('/obat')->with('success', 'Obat berhasil diperbarui.');
}

public function destroy(Obat $obat)
{
    $obat->delete();
    return redirect('/obat')->with('success', 'Obat berhasil dihapus.');
}

}