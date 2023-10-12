<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Occupation: string implements HasLabel
{
    case PRO_PLAYER       = 'Pro Player';
    case STREAMER         = 'Streamer';
    case COACH            = 'Treinador';
    case ANALYST          = 'Analista';
    case PSYCHOLOGIST     = 'Psicólogo(a)';
    case PHYSIOTHERAPIST  = 'Fisioterapeuta';
    case NUTRITIONIST     = 'Nutricionista';
    case PERSONAL_TRAINER = 'Preparador Físico';
    case TRANSLATOR       = 'Tradutor(a)';
    case GRAPHIC_DESIGNER = 'Designer Gráfico';
    case VIDEO_EDITOR     = 'Editor de Vídeo';

    public function getLabel(): string
    {
        return $this->value;
    }
}
