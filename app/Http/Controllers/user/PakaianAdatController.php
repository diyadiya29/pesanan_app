<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanPakaianAdat;
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
            'stok' => $request->stok,
            'harga' => $request->harga
        ];

        $cart = Session::get('cart', []);
        if($cart){
            $filtered_pakaian_adat = array_filter(Session::get('cart'), function($item) use($request) {
                return $item['id_pakaian_adat'] == $request->id_pakaian_adat;
            });

            if(count($filtered_pakaian_adat) == 1){
                $key = array_keys($filtered_pakaian_adat)[0];
                $cart[$key]['stok'] += $request->stok;
                Session::put('cart', $cart);
            }
            else{
                $cart[] = $cartItem;
                Session::put('cart', $cart);
            }
        }
        else{
            $cart[] = $cartItem;
            Session::put('cart', $cart);
        }



        return redirect('/cart');
    }

    function removeCart($id){
        $cart = Session::get('cart', []);

        $updatedCart = array_filter($cart, function ($item) use ($id) {
            return $item['id_pakaian_adat'] !== $id;
        });

        // Reindex the array to prevent gaps in the keys
        $updatedCart = array_values($updatedCart);

        Session::put('cart', $updatedCart);
        return redirect('/cart')->with('success','Item berhasil dihapus');
    }

    function cart(){
        return view("user/cart");
    }
    function checkoutPakaianAdat(Request $request){
        $getLastCode = PesanPakaianAdat::max('kode_pendaftaran');
        if($getLastCode){
            $numb = (int)$getLastCode;
            $numb += 1;
            $code = sprintf("%04s", $numb);
        }
        else{
            $code = '0001';
        }

        $pesanPakaianAdat = new PesanPakaianAdat();
        $pesanPakaianAdat->kode_pendaftaran = $code;
        $pesanPakaianAdat->nama = $request->nama;
        $pesanPakaianAdat->no_hp = $request->no_hp;
        $pesanPakaianAdat->alamat = $request->alamat;
        $pesanPakaianAdat->grand_total = $request->grand_total;
        $pesanPakaianAdat->total_denda = 0;
        $pesanPakaianAdat->tanggal_pesan = date('Y-m-d');
        $pesanPakaianAdat->lama_pinjam = $request->hari;
        $pesanPakaianAdat->tanggal_pinjam = $request->tanggal_pinjam;
        $night = $request->hari;
        $pesanPakaianAdat->tanggal_kembali = date('Y-m-d',strtotime($request->tanggal_pinjam." +$night days"));
        $pesanPakaianAdat->status = 'pending';
        $pesanPakaianAdat->save();

        $cart = Session::get('cart', []);

        foreach ($cart as $key => $value) {
            $pesanPakaianAdatDetail = new DetailPesanPakaianAdat();
            $pesanPakaianAdatDetail->id_pesan_pakaian_adat = $pesanPakaianAdat->id;
            $pesanPakaianAdatDetail->id_pakaian_adat = $value['id_pakaian_adat'];
            $pesanPakaianAdatDetail->harga = $value['harga'];
            $pesanPakaianAdatDetail->qty = $value['stok'];
            $pesanPakaianAdatDetail->subtotal = $value['harga'] * $value['stok'] * $request->hari[$key];
            $pesanPakaianAdatDetail->save();

            $updateStock = MasterPakaianAdat::find($value['id_pakaian_adat']);
            $updateStock->stok = $updateStock->stok - $value['stok'];
            $updateStock->save();
        }
        Session::put('cart', []);

        $no_hp = substr($request->no_hp,1); 
        $no_hp = "62".$no_hp;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.saungwa.com/api/create-message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'appkey' => '991f80c7-fe4c-48ed-9995-7bd23b182226',
        'authkey' => 'CKgHMuqkmyfRIpU83wr319bJc1Ezu6Zm3QWEVQns3LODqWlB7i',
        'to' => $no_hp,
        'message' => "*Halo, ".$request->nama.". Pesanan kamu sudah kami terima dengan nomer pemesanan A".$code."*\r\nSilahkan datang ke outlet kami untuk pemesanan.\r\nTerimakasih",
        'sandbox' => 'false'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;        

        return redirect('/cart')->with('success','Pesanan Berhasil. Cek Whatsapp Anda');
    }
}
