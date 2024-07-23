<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['Nama', 'Tanggal_lahir', 'Alamat', 'jk', 'No_Hp', 'Bpjs'];

    public function nomorRekamMedis()
    {
        return $this->hasMany(nomor_rekammedis::class, 'id_pasien');
    }

    // Jika Anda ingin langsung mengakses rekam medis dari pasien (opsional)
    public function rekamMedis()
    {
        return $this->hasManyThrough(
            RekamMedis::class,
            nomor_rekammedis::class,
            'id_pasien', // Foreign key on nomor_rekammedis table
            'Rm_id', // Foreign key on rekam_medis table
            'id', // Local key on pasien table
            'nomor_rm' // Local key on nomor_rekammedis table
        );
    }
}
