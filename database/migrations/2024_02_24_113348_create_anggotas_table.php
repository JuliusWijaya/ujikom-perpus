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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->char('kd_anggota', 15);
            $table->string('nm_anggota');
            $table->char('jk', 2);
            $table->string('tp_lahir');
            $table->date('tg_lahir');
            $table->text('alamat');
            $table->char('no_hp', 13);
            $table->string('jns_anggota');
            $table->string('status')->default('active');
            $table->integer('jml_pinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
