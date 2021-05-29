<?php

namespace App\Helpers;

class General
{
    public static function searchForKeyword($keyword, $value, $array)
    {
        foreach ($array as $key => $val) {
            if ($val[$keyword] === $value) {
                return $key;
            }
        }
        return null;
    }

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

    public static function getDurationBySeconds($second)
    {
        $seconds = $second % 60;
        $minutes = floor(($second % 3600) / 60);
        $hours = floor(($second % 86400) / 3600);
        $days = floor(($second % 2592000) / 86400);

        return
            ($days != 0 ? $days . ' Gün' : '') .
            ($hours != 0 ? ' ' . $hours . ' Saat' : '') .
            ($minutes != 0 ? ' ' . $minutes . ' Dakika' : '') .
            ($seconds != 0 ? ' ' . $seconds . ' Saniye' : '');
    }

    public static function clearPhoneNumber($phoneNumber)
    {
        return str_replace('(', '', str_replace(')', '', str_replace('-', '', str_replace(' ', '', $phoneNumber))));
    }
}
