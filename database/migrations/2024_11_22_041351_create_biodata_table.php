<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id('id_biodata'); // Kolom id_biodata sebagai primary key
            $table->unsignedBigInteger('id_user'); // Foreign key ke tabel user
            $table->string('nama_lengkap', 100); // Nama lengkap
            $table->string('phone_number', 20); // Nama lengkap
            $table->string('alamat', 100); // Alamat
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}
