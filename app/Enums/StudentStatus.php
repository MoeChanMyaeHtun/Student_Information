<?php

namespace App\Enums;

enum StudentStatus: string
{
    case Active = 'Active';
    case OnLeave = 'On Leave';
    case Suspended = 'Suspended';
    case Graduated = 'Graduated';
    case Withdrawn = 'Withdrawn';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
    
}
