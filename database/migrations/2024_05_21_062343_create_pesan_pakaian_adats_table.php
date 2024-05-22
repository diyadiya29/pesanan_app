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
        Schema::create('pesan_pakaian_adats', function (Blueprint $table) {
            $table->id();
            $table->string("kode_pendaftaran");
            $table->string("email");
            $table->string("nama");
            $table->string("no_hp");
            $table->text("alamat");
            $table->integer("grand_total");
            $table->date("taggal_pesan");
            $table->date("tangga_pinjam");
            $table->date("tanggal_kembali");
            $table->date("tanggal_pengembalian");
            $table->integer("denda");
            $table->enum("status", ["pending", "disewa ", "selesai"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_pakaian_adats');
    }
};
