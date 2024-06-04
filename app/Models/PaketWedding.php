<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketWedding extends Model
{
    use HasFactory,SoftDeletes;

    function pesanPaketWedding(){
        return $this->hasMany(PesanWaketWedding::class,"id_paket_wedding");
    }
}
