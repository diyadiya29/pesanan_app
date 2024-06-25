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
            $table->dropColumn('lama_pinjam');
            $table->dropColumn('tanggal_pinjam');
            $table->dropColumn('tanggal_kembali');
            $table->dropColumn('tanggal_pesan');
            $table->dropColumn('tanggal_pengembalian');
        });

        Schema::table('pesan_pakaian_adats', function (Blueprint $table) {
            $table->tinyInteger('lama_pinjam')->after('grand_total')->nullable();
            $table->date('tanggal_pesan')->after('lama_pinjam')->nullable();
            $table->date('tanggal_pinjam')->after('tanggal_pesan')->nullable();
            $table->date('tanggal_kembali')->after('tanggal_pinjam')->nullable();
            $table->date('tanggal_pengembalian')->nullable()->after('tanggal_kembali');
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
