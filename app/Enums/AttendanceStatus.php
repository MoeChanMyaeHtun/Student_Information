<?php

namespace App\Enums;

enum AttendanceStatus: string
{
    case Present = 'Present';
    case Absent = 'Absent';
    case Excused = 'Excused';
    case Late = 'Late';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}