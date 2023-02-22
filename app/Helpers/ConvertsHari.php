<?php

namespace App\Helpers;

class ConvertsHari
{

    public static function converthari($hari)
    {
        if ($hari == 0) {
            $hari = 'Minggu';
        } elseif ($hari == 1) {
            $hari = 'Senin';
        } elseif ($hari == 2) {
            $hari = 'Selasa';
        } elseif ($hari == 3) {
            $hari = 'Rabu';
        } elseif ($hari == 4) {
            $hari = 'Kamis';
        } elseif ($hari == 5) {
            $hari = 'Jumat';
        } elseif ($hari == 6) {
            $hari = 'Sabtu';
        }
        return $hari;
    }
}
