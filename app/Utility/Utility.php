<?php

namespace App\Utility;


class Utility
{

    public static function calculateBand($number){
        $band = 0;
        switch ($number){
            case ($number == 39 || $number == 40):
                $band = 9; break;
            case ($number == 37 || $number == 38):
                $band = 8.5; break;
            case ($number == 35 || $number == 36):
                $band = 8; break;
            case ($number >= 32 && $number <= 34):
                $band = 7.5; break;
            case ($number == 30 || $number == 31):
                $band = 7; break;
            case ($number >= 26 && $number <= 29):
                $band = 6.5; break;
            case ($number >= 23 && $number <= 25):
                $band = 6; break;
            case ($number >= 18 && $number <= 22):
                $band = 5.5; break;
            case ($number == 16 || $number == 17):
                $band = 5; break;
            case ($number >= 13 && $number <= 15):
                $band = 4.5; break;
            case ($number >= 11 && $number <= 12):
                $band = 4; break;
            default:
                $band = 0; break;
        }

        return $band;
    }

}