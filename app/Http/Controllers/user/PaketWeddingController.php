<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PaketWedding;
use Illuminate\Http\Request;

class PaketWeddingController extends Controller
{
    function detail($id){
        $data_paket = PaketWedding::where('id','=',$id)->first();
        return view("user/detail-wedding",compact('data_paket'));
    }
}
