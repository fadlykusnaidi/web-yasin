<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_rm', 'status'];

    public function status()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rm');
    }
}
