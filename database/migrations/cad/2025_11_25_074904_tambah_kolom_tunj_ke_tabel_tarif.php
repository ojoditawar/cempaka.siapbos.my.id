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
        Schema::table('tarifs', function (Blueprint $table) {
            $table->integer('dk')->default(0)->after('harga');
            $table->integer('tk')->default(0)->after('dk');
            $table->integer('tj')->default(0)->after('tk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tarifs', function (Blueprint $table) {
            $table->dropColumn('dk');
            $table->dropColumn('tk');
            $table->dropColumn('tj');
        });
    }
};
