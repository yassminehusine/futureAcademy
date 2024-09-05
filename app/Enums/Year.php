<?php

namespace App\Enums;


enum Year: string
{
    case YEAR_1 = '1';
    case YEAR_2 = '2';
    case YEAR_3 = '3';
    case YEAR_4 = '4';
    case GRADUATED = 'graduated';
public static function getRandomKey(): string
{
    $cases = self::cases();
    return $cases[array_rand($cases)]->name;
}
}
