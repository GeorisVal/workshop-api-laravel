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
        Schema::create('link_genres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_movie')->nullable()->constrained('movies')->onDelete('cascade');
            $table->foreignId('id_serie')->nullable()->constrained('series')->onDelete('cascade');
            $table->foreignId('id_genre')->constrained('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
