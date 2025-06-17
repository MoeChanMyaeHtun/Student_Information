<?php

namespace App\Enums;

enum CurrentSemester: string
{
    case FirstYearFirst = '1st year 1st semester';
    case FirstYearSecond = '1st year 2nd semester';
    case SecondYearFirst = '2nd year 1st semester';
    case SecondYearSecond = '2nd year 2nd semester';
    case ThirdYearFirst = '3rd year 1st semester';
    case ThirdYearSecond = '3rd year 2nd semester';
    case FourthYearFirst = '4th year 1st semester';
    case FourthYearSecond = '4th year 2nd semester';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
    
}
