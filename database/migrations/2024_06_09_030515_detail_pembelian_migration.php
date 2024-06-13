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
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembelian');
            $table->integer('id_obat');
            $table->string('nama_obat');
            $table->integer('harga_obat');
            $table->integer('jumlah_stok');
            $table->integer('sub_total');
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('id_pembelian')->references('id')->on('pembelian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian');
    }
};
