<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PaketWedding;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    function paket_wedding(){
        $wedding=PaketWedding::get();
        return view("user/paket_wedding",compact('wedding'));
        
    }
}
