<?php

namespace App\Enums;

enum Position: string
{
    case TOP     = 'Top Laner';
    case JUNGLER = 'Caçador';
    case MID     = 'Mid Laner';
    case ADC     = 'Atirador';
    case SUPPORT = 'Suporte';
}
