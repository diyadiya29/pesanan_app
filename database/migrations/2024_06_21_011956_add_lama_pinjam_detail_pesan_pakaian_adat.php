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
            $table->tinyInteger('lama_pinjam')->after('qty');
            $table->date('tanggal_pinjam')->nullable()->change();
            $table->date('tanggal_kembali')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pesan_pakaian_adats', function (Blueprint $table) {
            $table->dropColumn('lama_pinjam');
        });
    }
};
