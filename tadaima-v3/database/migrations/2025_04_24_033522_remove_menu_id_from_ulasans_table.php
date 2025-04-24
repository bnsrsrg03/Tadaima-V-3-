<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('ulasans', function (Blueprint $table) {
            // Hapus foreign key constraint terlebih dahulu
            $table->dropForeign(['menu_id']);
    
            // Baru hapus kolomnya
            $table->dropColumn('menu_id');
        });
    }
    

    public function down(): void
    {
        Schema::table('ulasans', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id')->nullable();
        });
    }
};
