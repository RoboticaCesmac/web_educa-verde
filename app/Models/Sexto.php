<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'objetivo',
        'habilidades',
        'leitura_discussao',
        'video_conteudo',
        'video_exposicaop_conteudo',
        'video_exposicaop_link',
        'video_exposicaot_conteudo',
        'video_exposicaot_link',
        'atividade',
    ];
}
