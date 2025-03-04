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
        Schema::create('generos', function (Blueprint $table) {
            $table->id();
            $table->enum('genero', ['Rock', 'Pop', 'Jazz', 'Hip-Hop', 'Clasica', 'Electronica', 'Indie', 'R&B', 'Latina', 'Alternativa']);
            $table->string('sub-genero')
                ->nullable();
            $table->foreignId('disco_id')->
            constrained()
                ->onUpdate('cascade')
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generos');
    }
};
