<?php

namespace App\Enums;

enum SupportStatus : string
{
    case o = "Open";
    case p = "Pendent";
    case c = "Closed";

    public static function fromValue(string $name) : string
    {
        foreach(self::cases() as $status){
            if($name === $status->name){
                return $status->value;
            }
        }
        throw new \ValueError("$name is not valid");
    }
    
}