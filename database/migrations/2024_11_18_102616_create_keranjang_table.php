<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('id_keranjang'); // Primary key
            $table->unsignedBigInteger('id_user'); // Foreign key user
            $table->unsignedBigInteger('id_sepatu'); // Foreign key sepatu
            $table->integer('jumlah_produk'); // Jumlah produk
            $table->string('ukuran_sepatu', 10)->nullable(); // Ukuran sepatu
            $table->string('varian_sepatu', 50)->nullable(); // Varian sepatu
            $table->timestamps(); // created_at dan updated_at

            // Tambahkan foreign key jika ada relasi
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('id_sepatu')->references('id')->on('sepatu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}