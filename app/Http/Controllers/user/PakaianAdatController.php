<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\MasterPakaianAdat;
use App\Models\PesanPakaianAdat;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class PakaianAdatController extends Controller
{
    function detail($id){
        $data_paket = MasterPakaianAdat::where('id','=',$id)->first();
        return view("user/detail-pakaian-adat",compact('data_paket'));
    }

    function simpanCart(Request $request){
        $cartItem = [
            'id_pakaian_adat' => $request->id_pakaian_adat,
            'foto' => $request->foto,
            'nama' => $request->nama,
            'stok' => $request->stok
        ];

        $cart = Session::get('cart', []);

        $cart[] = $cartItem;
        Session::put('cart', $cart);
        return redirect('/cart');
    }

    function cart(){
        return view("user/cart");
    }
}
