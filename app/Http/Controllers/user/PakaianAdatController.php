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

        $filtered_pakaian_adat = array_filter(Session::get('cart'), function($item) use($request) {
            return $item['id_pakaian_adat'] == $request->id_pakaian_adat;
        });

        $cart = Session::get('cart', []);

        if(count($filtered_pakaian_adat) == 1){
            $key = array_keys($filtered_pakaian_adat)[0];
            $cart[$key]['stok'] += $request->stok;
            Session::put('cart', $cart);
        }
        else{
            $cart[] = $cartItem;
            Session::put('cart', $cart);
        }

        return redirect('/cart');
    }

    function cart(){
        return Session::get('cart');
        return view("user/cart");
    }
}
