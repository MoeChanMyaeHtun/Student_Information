<?php

namespace App\Enums;

enum Gender: string
{
    case Male = 'Male';
    case Female = 'Female';
    case PreferNotToSay = 'Prefer not to say';
    case Other = 'Other';

     public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

}
