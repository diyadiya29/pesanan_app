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
    function deletePesanPakaianAdatPending($id) {
        DetailPesanPakaianAdat::where('id_pesan_pakaian_adat',$id)->delete();
        PesanPakaianAdat::where('id',$id)->delete();
        return redirect()->back()->with('success','Pesanan Berhasil Dihapus');
    }
    function confirmPesanPakaianAdatPending($id) {
        $pesan = PesanPakaianAdat::find($id);
        $pesan->status = 'disewa';
        $pesan->save();
        return redirect()->back()->with('success','Pesanan Berhasil Diconfirmasi');
    }

    function detail($id) {
        $detail= DetailPesanPakaianAdat::with('masterPakaianAdat')->where('id_pesan_pakaian_adat','=',$id)->get();
        return view('admin/pesan-pakaian-adat/pesan-detail', compact('detail'));
    }

    function pengembalianPakaianAdat(Request $request){
        $getData = PesanPakaianAdat::find($request->id_pesanan);
        $getData->status = 'selesai';
        $getData->tanggal_pengembalian = $request->tanggal_pengembalian;
        $getData->total_denda = $request->denda;
        $getData->save();

        $detail = DetailPesanPakaianAdat::where('id_pesan_pakaian_adat',$getData->id)->get();
        
        foreach ($detail as $key => $value) {
            $update = MasterPakaianAdat::find($value->id_pakaian_adat);
            $update->stok = $update->stok + $value->qty;
            $update->save();
        }
        return redirect()->back()->with('success','Pesanan Telah Dikembalikan');
    }
}
