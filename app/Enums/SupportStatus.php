<?php

namespace App\Enums;

enum SupportStatus : string
{
    case O = "Open";
    case P = "Pendent";
    case C = "Closed";

    public static function fromValue(string $status) : string
    {
        foreach(self::cases() as $status){
            if($status === $status->name){
                return $status->value;
            }
        }
        throw new \ValueError("$status is not valid");
    }
    
}