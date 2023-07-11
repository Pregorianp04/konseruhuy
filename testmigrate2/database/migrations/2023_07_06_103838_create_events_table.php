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
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_event');
            $table->string('nama_event', 30);
            $table->string('gambar_event')->default('');
            $table->date('tgl_event');
            $table->string('deskripsi_event', 20);
            $table->string('lokasi_event', 100);
            $table->integer('kuota_event');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
