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
        Schema::create('obats', function (Blueprint $table) {
            $table->uuid('KdObat')->primary();
            $table->string('NmObat');
            $table->string('Jenis');
            $table->string('Satuan');
            $table->double('HargaBeli');
            $table->double('HargaJual');
            $table->integer('Stok');
            $table->foreignUuid('KdSuplier')->references('KdSuplier')->on('supliers')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
