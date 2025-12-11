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
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->references('id')->on('jenis')->constrained()->cascadeOnDelete();
            $table->string('kode', 2);
            $table->string('nama');
            $table->integer('harga');
            $table->integer('dk')->default(0);
            $table->integer('tk')->default(0);
            $table->integer('tj')->default(0);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
            $table->unique(['jenis_id', 'kode']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
