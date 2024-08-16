<?php

namespace App\DTO;

class nonoDTO {
    public function __construct(
        public readonly string $titulo,
        public readonly string $objetivo,
        public readonly string $habilidades,
        public readonly string $leitura_discussao,
        public readonly string $video_conteudo,
        public readonly string $video_exposicaop_conteudo,
        public readonly ?string $video_exposicaop_link,
        public readonly string $video_exposicaot_conteudo,
        public readonly ?string $video_exposicaot_link,
        public readonly string $atividade,
    ) {

    }

    public static function fromRequest(array $data):array{
        $dto = new self(
            titulo: $data['titulo'],
            objetivo: $data['objetivo'],
            habilidades: $data['habilidades'],
            leitura_discussao: $data['leitura_discussao'],
            video_conteudo: $data['video_conteudo'],
            video_exposicaop_conteudo: $data['video_exposicaop_conteudo'],
            video_exposicaop_link: $data['video_exposicaop_link'] ?? null,
            video_exposicaot_conteudo: $data['video_exposicaot_conteudo'],
            video_exposicaot_link: $data['video_exposicaot_link'] ?? null,
            atividade: $data['atividade'],
        );

        return $dto->toArray();
    }

    public function toArray():array {
        return [
            'titulo' => $this->titulo,
            'objetivo' => $this->objetivo,
            'habilidades' => $this->habilidades,
            'leitura_discussao' => $this->leitura_discussao,
            'video_conteudo' => $this->video_conteudo,
            'video_exposicaop_conteudo' => $this->video_exposicaop_conteudo,
            'video_exposicaop_link' => $this->video_exposicaop_link,
            'video_exposicaot_conteudo' => $this->video_exposicaot_conteudo,
            'video_exposicaot_link' => $this->video_exposicaot_link,
            'atividade' => $this->atividade,
        ];
    }
}