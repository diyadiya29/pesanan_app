<?php

use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\KontakController;
use App\Http\Controllers\user\ProdukController;
use App\Http\Controllers\user\WeddingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"home"]);
Route::get('/kontak', [KontakController::class,"kontak"]);
Route::get('/pakaian_adat', [ProdukController::class,"pakaian_adat"]);
route::get('/paket_wedding', [WeddingController::class,"paket_wedding"]);
