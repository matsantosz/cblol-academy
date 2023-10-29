<?php

namespace App\Enums;

enum Category: string
{
    case PRO_PLAYER       = 'Pro Player';
    case CONTENT_CREATOR  = 'Criador de Conteúdo';
    case COACH            = 'Treinador';
    case ANALYST          = 'Analista';
    case PSYCHOLOGIST     = 'Psicólogo';
    case PHYSIOTHERAPIST  = 'Fisioterapeuta';
    case TRANSLATOR       = 'Tradutor';
    case GRAPHIC_DESIGNER = 'Designer Gráfico';
    case VIDEO_EDITOR     = 'Editor de Vídeo';

    public function plural(): string
    {
        return match ($this) {
            self::PRO_PLAYER       => 'Pro Players',
            self::CONTENT_CREATOR  => 'Criadores de Conteúdo',
            self::COACH            => 'Treinadores',
            self::ANALYST          => 'Analistas',
            self::PSYCHOLOGIST     => 'Psicólogos',
            self::PHYSIOTHERAPIST  => 'Fisioterapeutas',
            self::TRANSLATOR       => 'Tradutores',
            self::GRAPHIC_DESIGNER => 'Designers Gráficos',
            self::VIDEO_EDITOR     => 'Editores de Vídeo',
        };
    }
}
