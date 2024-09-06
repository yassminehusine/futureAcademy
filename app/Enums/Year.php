<?php

namespace App\Enums;


enum Year: string
{
    case YEAR_1 = 'First';
    case YEAR_2 = 'Second';
    case YEAR_3 = 'Third';
    case YEAR_4 = 'Fourth';
    case GRADUATED = 'Graduate';
    case NONE = '--';


public static function getRandomKey(): string
{
    $cases = self::cases();
    return $cases[array_rand($cases)]->name;
}
}
