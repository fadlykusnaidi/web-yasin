<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $fillable = ['Rm_id', 'Keluhan', 'id_dokter', 'Obat', 'kunjungan'];

    
    // public function pasien()
    // {
    //     return $this->hasOneThrough(
    //         Pasien::class,
    //         nomor_rekammedis::class,
    //         'nomor_rm', // Foreign key on nomor_rekammedis table...
    //         'id', // Foreign key on Pasien table...
    //         'Rm_id', // Local key on RekamMedis table...
    //         'id_pasien' // Local key on nomor_rekammedis table...
    //     );
    // }

    public function resepObat()
    {
        return $this->hasMany(Resep::class, 'id_rm');
        }   
    public function nomorRekamMedis()
    {
        return $this->belongsTo(nomor_rekammedis::class, 'Rm_id', 'id');
    }public function statusObat()
    {
        return $this->hasMany(ResepObat::class, 'id_rm');
    }

        }