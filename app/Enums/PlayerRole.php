<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PlayerRole: string implements HasLabel
{
    case TOP     = 'Top Laner';
    case JUNGLER = 'Caçador';
    case MID     = 'Mid Laner';
    case ADC     = 'Atirador';
    case SUPPORT = 'Suporte';

    public function getLabel(): string
    {
        return $this->value;
    }
}
