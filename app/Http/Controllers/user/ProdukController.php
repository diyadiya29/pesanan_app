<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\MasterPakaianAdat;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    function pakaian_adat(){
        $pakaian_adat=MasterPakaianAdat::get();
        return view("user/produk",compact('pakaian_adat'));
        
    }
}
