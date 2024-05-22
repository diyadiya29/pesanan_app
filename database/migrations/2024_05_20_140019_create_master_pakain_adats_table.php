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
        Schema::create('master_pakaian_adats', function (Blueprint $table) {
            $table->id();
            $table->string("nama_produk");
            $table->integer("stok");
            $table->integer("harga");
            $table->text("deskripsi");
            $table->text("foto");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pakain_adats');
    }
};
