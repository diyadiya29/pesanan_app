<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanPakaianAdat extends Model
{
    use HasFactory;

    function masterPakaianAdat(){
        return $this->belongsTo(MasterPakaianAdat::class, 'id_pakaian_adat');
    }

}
