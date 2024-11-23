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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_sepatu');
            $table->string('nama_sepatu');
            $table->decimal('harga_sepatu', 10, 2);
            $table->string('jk_sepatu');
            $table->string('kategori_sepatu');
            $table->string('merek_sepatu');
            $table->text('deskripsi_sepatu')->nullable();
            $table->string('gambar_sepatu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};