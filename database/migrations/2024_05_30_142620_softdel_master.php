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
        Schema::table('master_pakaian_adats', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
        Schema::table('paket_weddings', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_pakaian_adats', function (Blueprint $table) {
            //
        });
    }
};
