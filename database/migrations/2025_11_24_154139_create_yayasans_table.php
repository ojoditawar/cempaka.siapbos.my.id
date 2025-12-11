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
        Schema::create('yayasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnDelete();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email')->nullable(true);
            $table->string('logo')->nullable(true);
            $table->string('npwp')->nullable(false);
            $table->string('bank')->nullable(false);
            $table->string('no_rekening')->nullable(false);
            $table->string('atas_nama')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yayasans');
    }
};
