<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSextoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'objetivo' => 'required',
            'habilidades' => 'required',
            'leitura_discussao' => 'required',
            'video_conteudo' => 'required',
            'video_exposicaop_conteudo' => 'required',
            'video_exposicaop_link' => 'required',
            'video_exposicaot_conteudo' => 'required',
            'video_exposicaot_link' => 'required',
        ];
    }

    public function messages(){
        return [ 
            'required' => 'O campo :attribute deve ser preenchido!',
            'leitura_discussao.required' => 'O campo de leitura e discussão deve ser preenchido!',
            'video_conteudo.required' => 'O campo do conteúdo dos vídeos deve ser preenchido!',
            'video_exposicaop_conteudo.required' => 'O campo do conteúdo do vídeo de exposição prático deveve ser preenchido!',
            'video_exposicaop_link.required' => 'O campo com o link para o vídeo de exposição prático deve ser preenchido!',
            'video_exposicaot_conteudo.required' => 'O campo do conteúdo do vídeo de exposição teórico deveve ser preenchido!',
            'video_exposicaot_link.required' => 'O campo com o link para o vídeo de exposição teórico deve ser preenchido!',
        ];
    }
}
