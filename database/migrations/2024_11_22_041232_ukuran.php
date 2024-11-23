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
        Schema::create('ukuran', function (Blueprint $table) {
            $table->id('id_ukuran'); // Primary key
            $table->unsignedBigInteger('id_sepatu'); // Foreign key sepatu
            $table->string('ukuran_sepatu', 50);
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukuran');
    }
};
