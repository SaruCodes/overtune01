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
        Schema::create('discos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->string('tipo');
            $table->integer('año');
            $table->string('artista');
            $table->string('cover_image')->nullable()->default('images/discos/placeholder.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discos');
    }
};

