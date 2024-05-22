<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    function kontak(){
        return view("user/kontak");
    }
}
