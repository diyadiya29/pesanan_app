<?php

use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\KontakController;
use App\Http\Controllers\user\ProdukController;
use App\Http\Controllers\user\WeddingController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDetailiPakaianAdatController;
use App\Http\Controllers\admin\AdminPakaianAdatController;
use App\Http\Controllers\admin\AdminPaketWeddingController;
use App\Http\Controllers\admin\AdminPesananPaketWeddingController;
use App\Http\Controllers\admin\AdminPesanPakaianAdatController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\user\PakaianAdatController;
use App\Http\Controllers\user\PaketWeddingController;
use App\Models\PesanPakaianAdat;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"home"]);
Route::get('/kontak', [KontakController::class,"kontak"]);
Route::get('/pakaian_adat', [ProdukController::class,"pakaian_adat"]);
Route::get('/paket_wedding', [WeddingController::class,"paket_wedding"]);
Route::get('/admin',[AdminController::class,"home"]);
Route::get('/admin/delete-pesanan-paket-wedding/{id}',[AdminPesananPaketWeddingController::class,"deletePesanan"]);
Route::get('/admin/paket-wedding/data-paket',[AdminPaketWeddingController::class,"DataPaket"]);
Route::post('/admin/pesan-pakaian-adat/pengembalian-pakaian-adat',[AdminPesanPakaianAdatController::class,"pengembalianPakaianAdat"]);
Route::get('/admin/pesan-pakaian-adat/data-pakaian-adat',[AdminPesanPakaianAdatController::class,"pesanPakaianAdat"]);
Route::get('/admin/pesan-pakaian-adat/data-pakaian-adat-pending',[AdminPesanPakaianAdatController::class,"pesanPakaianAdatPending"]);
Route::get('/admin/pesan-pakaian-adat/delete-data-pakaian-adat-pending/{id}',[AdminPesanPakaianAdatController::class,"deletePesanPakaianAdatPending"]);
Route::get('/admin/pesan-pakaian-adat/confirm-data-pakaian-adat-pending/{id}',[AdminPesanPakaianAdatController::class,"confirmPesanPakaianAdatPending"]);

Route::get('/admin/pesanana-paket-wedding',[AdminPesananPaketWeddingController::class,"pesanWedding"]);
Route::get('/admin/pakaian-adat/master-pakaian-adat',[AdminPakaianAdatController::class,"dataPakaianAdat"]);

Route::get('/paket-wedding/detail/{id}',[PaketWeddingController::class,'detail']);
Route::get('/pakaian_adat/detail/{id}',[PakaianAdatController::class,'detail']);
Route::post('/store-pesan-wedding',[WeddingController::class,'checkoutWedding']);
Route::post('/checkout-pakaian-adat',[PakaianAdatController::class,'checkoutPakaianAdat']);
Route::post('/simpan-cart-pakaian-adat',[PakaianAdatController::class,'simpanCart']);
Route::get('/cart',[PakaianAdatController::class,'cart']);
Route::get('/remove-cart/{id}',[PakaianAdatController::class,'removeCart']);
Route::get('/admin/pesan-pakaian-adat/pesan-detail/{id}',[AdminPesanPakaianAdatController::class,'detail']);
Route::get('/admin/pakaian-adat/tambah-pakaian-adat',[AdminPakaianAdatController::class,"tambah"]);
Route::post('/admin/pakaian-adat/simpan-pakaian-adat',[AdminPakaianAdatController::class,"simpan"]);
route::get('/admin/paket-wedding/tambah-paket',[AdminPaketWeddingController::class,"tambah"]);
route::post('/admin/paket-wedding/simpan-paket',[AdminPaketWeddingController::class,"simpan"]);
Route::get('/admin/pakaian-adat/edit-pakaian-adat/{id}',[AdminPakaianAdatController::class,"edit"]);
Route::put('/admin/pakaian-adat/update-pakaian-adat/{id}',[AdminPakaianAdatController::class,'update']);
Route::get('/admin/pakaian-adat/delete-pakaian-adat/{id}',[AdminPakaianAdatController::class,'delete']);
Route::get('/admin/paket-wedding/edit-paket-wedding/{id}',[AdminPaketWeddingController::class,"edit"]);
Route::put('/admin/paket-wedding/update-paket-wedding/{id}',[AdminPaketWeddingController::class,'update']);
Route::get('/admin/pakaian-wedding/delete-paket-wedding/{id}',[AdminPaketWeddingController::class,'delete']);
route::get('/admin/pesanan-waket-wedding/tambah-pasan',[AdminPesananPaketWeddingController::class,"tambah"]);
route::post('/admin/pesanan-waket-wedding/simpan-pasan-wedding',[AdminPesananPaketWeddingController::class,"simpan"]);
Route::post('/upload-photo', [PhotoController::class, 'store'])->name('upload.photo');