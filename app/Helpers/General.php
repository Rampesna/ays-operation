<?php

namespace App\Helpers;

class General
{
    public static function displayDates($date1, $date2, $format = 'Y-m-d')
    {
        $dates = array();
        $current = strtotime($date1);
        $date2 = strtotime($date2);
        $stepVal = '+1 day';
        while ($current <= $date2) {
            $dates[] = date($format, $current);
            $current = strtotime($stepVal, $current);
        }
        return $dates;
    }

    public static function clearTagifyTags($tags)
    {
        $returnObject = [];

        foreach (json_decode($tags) as $key => $tag) {
            $returnObject[] = $tag->value;
        }

        return implode(',', $returnObject);
    }

    public static function clearFormRepeater($checklist)
    {
        $returnObject = [];

        foreach ($checklist as $key => $value) {
            $returnObject[] = $value['checklist'];
        }

        return $returnObject;
    }
}
