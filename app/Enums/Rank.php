<?php

namespace App\Enums;

enum Rank: string
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
}
