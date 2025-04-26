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
        Schema::create('pembelian_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('Nota')->references('Nota')->on('pembelians')->cascadeOnDelete();
            $table->foreignUuid('KdObat')->references('KdObat')->on('obats')->cascadeOnDelete();
            $table->integer('Jumlah');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_details');
    }
};
