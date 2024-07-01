<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PaketWedding;
use App\Models\PesanWaketWedding;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    function paket_wedding(){
        $wedding=PaketWedding::get();
        return view("user/paket_wedding",compact('wedding'));
    }
    function checkoutWedding(Request $request){
        $getLastCode = PesanWaketWedding::max('kode_pendaftaran');
        if($getLastCode){
            $numb = (int)$getLastCode;
            $numb += 1;
            $code = sprintf("%04s", $numb);
        }
        else{
            $code = '0001';
        }
        
        $pesanPaketWedding = new PesanWaketWedding();
        $pesanPaketWedding->kode_pendaftaran =  $code;
        $pesanPaketWedding->nama = $request->nama;
        $pesanPaketWedding->no_hp = $request->no_hp;
        $pesanPaketWedding->alamat = $request->alamat;
        $pesanPaketWedding->grand_total = $request->grand_total;
        $pesanPaketWedding->id_paket_wedding = $request->id_paket_wedding;
        $pesanPaketWedding->tanggal_pesan = date('Y-m-d');
        $pesanPaketWedding->tanggal_acara = $request->tanggal_acara;
        $pesanPaketWedding->tanggal_selesai = $request->tanggal_selesai;
        $pesanPaketWedding->save();

        $curl = curl_init();

        $no_hp = substr($request->no_hp,1); 
        $no_hp = "62".$no_hp;

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
        'message' => "*Halo, ".$request->nama.". Pesanan kamu sudah kami terima dengan nomer pemesanan W".$code."*\r\nSilahkan datang ke outlet kami untuk pemesanan.\r\nTerimakasih",
        'sandbox' => 'false'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        return redirect()->back()->with('success','Pesanan Berhasil. Cek Whatsapp Anda');
    }
}
