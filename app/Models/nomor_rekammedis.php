<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nomor_rekammedis extends Model
{
    use HasFactory;

    protected $fillable = ['nomor_rm', 'id_pasien'];

    // Relasi ke model Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    // Relasi ke model RekamMedis
    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'Rm_id', 'nomor_rm');
    }
}
