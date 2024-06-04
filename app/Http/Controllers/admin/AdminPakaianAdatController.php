<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MasterPakaianAdat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminPakaianAdatController extends Controller
{
    function dataPakaianAdat() {
        $data_paket = MasterPakaianAdat::get();
        return view('admin/pesan-pakaian-adat/data-pakaian-adat', compact('data_paket'));
    }

    function tambah(){
        return view('admin/pesan-pakaian-adat/tambah-pakaian-adat');
    }

    function simpan(Request $request){
        $pakaian_adat = new MasterPakaianAdat();
        $pakaian_adat->nama_produk = $request->nama_produk;
        $pakaian_adat->stok = $request->stok_produk;
        $pakaian_adat->harga = $request->harga_produk;
        $pakaian_adat->deskripsi = $request->deskripsi;

        $foto = $request->file('foto_produk');
        $destinationPath = public_path('user/assets/img/baju-adat'); //folder pakaian adat
        $randomString = Str::random(5); //nama acak untuk file
        $fileName = $randomString . '.' . $foto->extension(); //nama baru file   
        $foto->move($destinationPath, $fileName);  //memindahkan foto yang di upload ke folder pakain adat 
        
        $pakaian_adat->foto = $fileName;
        $pakaian_adat->save();

        return redirect('/admin/pakaian-adat/master-pakaian-adat');
    }

    function edit($id){
        $pakaian_adat = MasterPakaianAdat::where('id',$id)->first();
        return view('admin/pesan-pakaian-adat/edit-pakaian-adat',compact('pakaian_adat'));
    }

    function update($id,Request $request){
        $pakaian_adat = MasterPakaianAdat::where('id',$id)->first(); //mencari data master berdasarkan id
        $pakaian_adat->nama_produk = $request->nama_produk;
        $pakaian_adat->stok = $request->stok_produk;
        $pakaian_adat->harga = $request->harga_produk;
        $pakaian_adat->deskripsi = $request->deskripsi;
        $pakaian_adat->save();

        return redirect()->back(); //untuk kembali ke halaman sebelumnya
    }    

    function delete($id){
        MasterPakaianAdat::where('id',$id)->delete(); //untuk delete
        return redirect()->back(); //untuk kembali ke halaman sebelumnya
    }
}
