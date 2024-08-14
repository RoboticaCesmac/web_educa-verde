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
        Schema::create('sextos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('objetivo');
            $table->text('habilidades');
            $table->text('leitura_discussao');
            $table->text('video_conteudo');
            $table->text('video_exposicaop_conteudo');
            $table->text('video_exposicaop_link');
            $table->text('video_exposicaot_conteudo');
            $table->text('video_exposicaot_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sextos');
    }
};
