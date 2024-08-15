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
            $table->longtext('objetivo');
            $table->longtext('habilidades');
            $table->longtext('leitura_discussao');
            $table->longtext('video_conteudo');
            $table->longtext('video_exposicaop_conteudo');
            $table->string('video_exposicaop_link');
            $table->longtext('video_exposicaot_conteudo');
            $table->string('video_exposicaot_link');
            $table->string('atividade');
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
