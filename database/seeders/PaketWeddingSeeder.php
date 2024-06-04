<?php

namespace Database\Seeders;

use App\Models\PaketWedding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketWeddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket_wedding = new PaketWedding;
        $paket_wedding->nama_paket = "Paket Super";
        $paket_wedding->harga = 10000000;
        $paket_wedding->deskripsi = "Ini paket super";
        $paket_wedding->foto = "super.jpg";
        $paket_wedding->save();
    }
}
