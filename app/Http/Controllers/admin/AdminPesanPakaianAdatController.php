<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanPakaianAdat;
use App\Models\MasterPakaianAdat;
use App\Models\PesanPakaianAdat;
use Illuminate\Http\Request;

class AdminPesanPakaianAdatController extends Controller
{
    function pesanPakaianAdat() {
        $pesan_paket = PesanPakaianAdat::where('status','!=','pending')->get();
        return view('admin/pesan-pakaian-adat/pesanan-pakaian-adat', compact('pesan_paket'));
    }
    function pesanPakaianAdatPending() {
        $pesan_paket = PesanPakaianAdat::where('status','=','pending')->get();
        return view('admin/pesan-pakaian-adat/pesanan-pending', compact('pesan_paket'));
    }

    function detail($id) {
        $detail= DetailPesanPakaianAdat::with('masterPakaianAdat')->where('id_pesan_pakaian_adat','=',$id)->get();
        return view('admin/pesan-pakaian-adat/pesan-detail', compact('detail'));
    }
}
