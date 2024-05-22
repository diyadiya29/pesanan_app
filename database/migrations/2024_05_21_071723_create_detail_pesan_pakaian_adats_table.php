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
        Schema::create('detail_pesan_pakaian_adats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("id_pesan_pakaian_adat")->unsigned();
            $table->bigInteger("id_pakaian_adat")->unsigned();
            $table->integer("harga");
            $table->integer("qty");
            $table->integer("subtotal");
            $table->timestamps();

            $table->foreign("id_pesan_pakaian_adat")->references("id")->on("pesan_pakaian_adats");
            $table->foreign("id_pakaian_adat")->references("id")->on("master_pakaian_adats");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesan_pakaian_adats');
    }
};
