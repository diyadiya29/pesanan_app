<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PesanWaketWedding;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPesananPaketWeddingController extends Controller
{
     function pesanwedding() {
        $pesan_paket = PesanWaketWedding::with('paketWedding')->get();
        return view('admin/paket-wedding/pesanan-paket-weding', compact('pesan_paket'));
    }

    function tambah(){
        return view('admin/pesanan-waket-wedding/tambah-pasan');
    }

    function simpan(Request $request){
        $pesanan_paket_wedding = new PesanWaketWedding();
        $pesanan_paket_wedding->kode_pendaftaran = $request->kode_pendaftaran;
        $pesanan_paket_wedding->nama = $request->nama_pesanan;
        $pesanan_paket_wedding->no_hp= $request->no_hp;
        $pesanan_paket_wedding->alamat = $request->alamat;
        $pesanan_paket_wedding->grand_total = $request->grand_total;
        $pesanan_paket_wedding->id_paket_wedding = $request->id_paket_wedding;
        $pesanan_paket_wedding->tanggal_pesan = $request->tanggal_pesan;
        $pesanan_paket_wedding->tanggal_acara = $request->tanggal_acara;
        $pesanan_paket_wedding->tanggal_selesai = $request->tanggal_selesai;
        $pesanan_paket_wedding->save();

        return redirect('/admin/pesanana-paket-wedding');
    }
}
