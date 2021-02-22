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
        if (!$checklist) {
            return [];
        }

        $returnObject = [];
        foreach ($checklist as $key => $value) {
            $returnObject[] = $value['checklist'];
        }
        return $returnObject;
    }

    public static function getDurationByMinutes($minutes)
    {
        $durationOfPermitMinutes = $minutes - (intval($minutes / 60) * 60);
        $durationOfPermitHours = intval($minutes / 60) - (intval(intval($minutes / 60) / 8) * 8);
        $durationOfPermitDays = intval(intval($minutes / 60) / 8);

        return
            ($durationOfPermitDays != 0 ? $durationOfPermitDays . ' Gün' : '') .
            ($durationOfPermitHours != 0 ? ' ' . $durationOfPermitHours . ' Saat' : '') .
            ($durationOfPermitMinutes != 0 ? ' ' . $durationOfPermitMinutes . ' Dakika' : '');
    }
}
