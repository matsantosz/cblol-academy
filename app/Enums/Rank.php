<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Rank: string implements HasLabel
{
    case IRON        = 'Ferro';
    case BRONZE      = 'Bronze';
    case SILVER      = 'Prata';
    case GOLD        = 'Ouro';
    case PLATINUM    = 'Platina';
    case DIAMOND     = 'Diamante';
    case MASTER      = 'Mestre';
    case GRANDMASTER = 'Grão-Mestre';
    case CHALLENGER  = 'Desafiante';

    public function getLabel(): string
    {
        return $this->value;
    }
}
