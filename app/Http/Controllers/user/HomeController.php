<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\MasterPakaianAdat;
use App\Models\PaketWedding;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home(){
        $pakaian_adat=MasterPakaianAdat::get();
        $wedding=PaketWedding::get();
        return view("user/home",compact('pakaian_adat','wedding'));
    }
}
