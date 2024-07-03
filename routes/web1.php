<?php
use App\Http\Controllers\admin\AdminPaketWeddingController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/paket-wedding/data-paket',[AdminPaketWeddingController::class,"DataPaket"]);

