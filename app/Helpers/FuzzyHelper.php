<?php

namespace App\Helpers;

class FuzzyHelper
{
    /**
     * Build fuzzy sets for Harga, Jarak, dan Fasilitas
     */
    public static function buildFuzzySet($type, $min, $max)
    {
        $sets = [];

        switch ($type) {
            case 'harga':
                $range = $max - $min;
                $mid = ($max + $min) / 2;
                $quarter = $range / 4;

                $sets['murah'] = [
                    'a' => $min,
                    'b' => $mid,  // 0 di mid
                    'type' => 'turun'
                ];
                $sets['sedang'] = [
                    'a' => $mid - $quarter,
                    'b' => $mid + $quarter,
                    'type' => 'turun'
                ];
                $sets['mahal'] = [
                    'a' => $mid,
                    'b' => $max,
                    'type' => 'turun'
                ];
                break;

            case 'jarak':
                $half = $max / 2;
                $quarter = $max / 4;

                $sets['dekat'] = [
                    'a' => 0,
                    'b' => $half,
                    'type' => 'turun'
                ];
                $sets['sedang'] = [
                    'a' => $half - $quarter,
                    'b' => $half + $quarter,
                    'type' => 'turun'
                ];
                $sets['jauh'] = [
                    'a' => $half,
                    'b' => $max,
                    'type' => 'turun'
                ];
                break;

            case 'fasilitas':
                $sets['kurang'] = [
                    'a' => 0,
                    'b' => 3,
                    'type' => 'naik'
                ];
                $sets['sedang'] = [
                    'a' => 4,
                    'b' => 7,
                    'type' => 'naik'
                ];
                $sets['lengkap'] = [
                    'a' => 8,
                    'b' => 10,
                    'type' => 'naik'
                ];
                break;
        }

        return $sets;
    }

    /**
     * Membership function for linear (naik / turun)
     */
 public static function linear($x, $a, $b, $type = 'turun')
{
    if ($type === 'turun') {
        if ($x <= $a) return 1;
        if ($x >= $b) return 0;
        return ($b - $x) / ($b - $a);
    } elseif ($type === 'naik') {
        if ($x <= $a) return 0;
        if ($x >= $b) return 1;
        return ($x - $a) / ($b - $a);
    }
    return 0;
}

    /**
     * Optional: Retain triangular for specific cases
     */
    public static function triangular($x, $a, $b, $c)
    {
        if ($x <= $a || $x >= $c) return 0;
        if ($x == $b) return 1;
        if ($x < $b) return ($x - $a) / ($b - $a);
        return ($c - $x) / ($c - $b);
    }
}
