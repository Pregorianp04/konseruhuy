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
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('CASCADE');
            $table->string('nama_event', 100);
            $table->string('gambar_event')->default('');
            $table->date('tgl_event');
            $table->string('deskripsi_event', 1000);
            $table->string('lokasi_event', 100);
            $table->integer('harga_event');
            $table->integer('kuota_event');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kategoris', function (Blueprint $table) {
            $table->dropForeign('kategoris_id_event_foreign');
        });

        Schema::dropIfExists('events');
    }
};
