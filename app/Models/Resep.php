<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $fillable = ['id_obat','id_rm','keterangan'];

    public function obat(){
        return $this->belongsTo(Obat::class,'id_obat');
    }

}
