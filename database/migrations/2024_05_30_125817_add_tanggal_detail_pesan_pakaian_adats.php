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
        Schema::table('detail_pesan_pakaian_adats', function (Blueprint $table) {
            $table->date("tanggal_pesan")->after('subtotal');
            $table->date("tanggal_pinjam")->after('tanggal_pesan');
            $table->date("tanggal_kembali")->after('tanggal_pinjam');
            $table->date("tanggal_pengembalian")->after('tanggal_kembali');
            $table->integer("denda")->after('tanggal_pengembalian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pesan_pakaian_adats', function (Blueprint $table) {
            //
        });
    }
};
