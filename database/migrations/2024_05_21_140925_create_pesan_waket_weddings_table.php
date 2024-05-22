<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesan_waket_weddings', function (Blueprint $table) {
            $table->id();
            $table->string("kode_pendaftaran");
            $table->string("nama");
            $table->string("no_hp");
            $table->string("alamat");
            $table->integer("grand_total");
            $table->bigInteger("id_paket_wedding")->unsigned();
            $table->date("tanggal_pesan");
            $table->date("tanggal_acara");
            $table->date("tanggal_selesai");
            $table->timestamps();

            $table->foreign("id_paket_wedding")->references("id")->on("paket_weddings");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_waket_weddings');
    }
};
