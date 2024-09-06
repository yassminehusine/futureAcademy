<?php

namespace App\Enums;
// ['computer science', 'management information system', 'information Technology'])
enum departmentRolse: string
{
    case ComputerScience = 'computer science';
    case ManagementInformationSystem = 'management information system';
    case InformationTechnology = 'information technology';
  
    public static function getRandomKey(): string
    {
        $cases = self::cases();
        return $cases[array_rand($cases)]->name;
    }
}


?>