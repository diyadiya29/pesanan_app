<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWedding;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPaketWeddingController extends Controller
{
    function dataPaket() {
        $data_paket = PaketWedding::get();
        return view('admin/paket-wedding/data-paket', compact('data_paket'));
    }
    
    function tambah(){
        return view('admin/paket-wedding/tambah-paket-wedding');
    }

    function simpan(Request $request){
        $paket_wedding = new PaketWedding();
        $paket_wedding->nama_paket = $request->nama_paket;
        $paket_wedding->harga = $request->harga_paket;
        $paket_wedding->deskripsi = $request->deskripsi;
        $paket_wedding->foto = $request->foto_paket;

        $foto = $request->file('foto_paket');
        $destinationPath = public_path('user/assets/img/wedding'); //folder pakaian adat
        $randomString = Str::random(5); //nama acak untuk file
        $fileName = $randomString . '.' . $foto->extension(); //nama baru file   
        $foto->move($destinationPath, $fileName);  //memindahkan foto yang di upload ke folder pakain adat 
        
        $paket_wedding->foto = $fileName;
        $paket_wedding->save();

        return redirect('/admin/paket-wedding/data-paket');
    }

    function edit($id){
        $paket_wedding = PaketWedding::where('id',$id)->first();
        return view('admin/paket-wedding/edit-paket-wedding',compact('paket_wedding'));
    }

    function update($id,Request $request){
        $paket_wedding = PaketWedding::where('id',$id)->first(); //mencari data master berdasarkan id
        $paket_wedding->nama_paket = $request->nama_paket;
        $paket_wedding->harga = $request->harga_paket;
        $paket_wedding->deskripsi = $request->deskripsi;
        $paket_wedding->save();

        return redirect()->back(); //untuk kembali ke halaman sebelumnya
    }  
    
    function delete($id){
        PaketWedding::where('id',$id)->delete(); //untuk delete
        return redirect()->back(); //untuk kembali ke halaman sebelumnya
    }
    
}
