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
        Schema::table('pesan_pakaian_adats', function (Blueprint $table) {
            $table->dropColumn('taggal_pesan');
            $table->dropColumn('tangga_pinjam');
            $table->dropColumn('tanggal_kembali');
            $table->dropColumn('tanggal_pengembalian');
            $table->renameColumn('denda','total_denda');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesan_pakaian_adats', function (Blueprint $table) {
            //
        });
    }
};
