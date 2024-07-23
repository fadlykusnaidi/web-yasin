<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $fillable = ['Nama', 'Keterangan'];

    public function rekammedis()
{
    return $this->belongsToMany(RekamMedis::class)->withPivot('keterangan');
}
}
