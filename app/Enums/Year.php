<?php

namespace App\Enums;


enum Year: string
{
    case First = 'First';
    case Second = 'Second';
    case Third = 'Third';
    case Fourth = 'Fourth';
    case Graduate = 'Graduate';
    case None = 'None';


public static function getRandomKey(): string
{
    $cases = self::cases();
    return $cases[array_rand($cases)]->name;
}
}
