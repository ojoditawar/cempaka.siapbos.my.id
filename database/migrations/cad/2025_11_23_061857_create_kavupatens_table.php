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
        Schema::create('kavupatens', function (Blueprint $table) {
            $table->string('kode');
            $table->foreign('kode')->references('kode')->on('provinsis')->restrictOnUpdate()->restrictOnDelete();
            $table->string('kab')->primary();
            $table->string('nama');
            $table->timestamps();
            $table->index('kab');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kavupatens');
    }
};
