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
        Schema::create('koleksis', function (Blueprint $table) {
            $table->id();
            $table->char('kd_koleksi', 15);
            $table->string('judul');
            $table->string('jns_bahan_pustaka');
            $table->string('jns_koleksi');
            $table->string('jns_media');
            $table->string('pengarang');
            $table->string('penerbit', 150);
            $table->year('tahun');
            $table->string('cetakan', 150);
            $table->string('edisi', 120);
            $table->string('status', 120)->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksis');
    }
};
