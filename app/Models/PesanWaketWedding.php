<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanWaketWedding extends Model
{
    use HasFactory;
    
    function paketWedding(){
        return $this->belongsTo(PaketWedding::class, 'id_paket_wedding');
    }
}
