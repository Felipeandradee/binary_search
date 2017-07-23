<?php

/**
 * Created by PhpStorm.
 * User: FelipeAndradee
 */
class binary_search
{
    public static function iterative($elem, $array)
    {
        $top = sizeof($array) - 1;
        $bot = 0;

        while ($bot <= $top)
        {
            $middle = floor(($top + $bot) / 2);
            if ($elem == $array[$middle]) {
                return $middle;
            }
            if ($elem < $array[$middle])
                $top = $middle - 1;
            else
                $bot = $middle + 1;
        }

        return $elem . ' not found.';
    }


    public static function recursive($elem, $array, $bot, $top)
    {
        $middle = floor(($top + $bot) / 2);
        if ($array[$middle] == $elem)
            return $middle;
        if ($bot > $top)
            return $elem . ' not found.';
        else {

            if ($array[$middle] < $elem)
                return binary_search::recursive($elem, $array, $middle + 1, $top);
            else
                return binary_search::recursive($elem, $array, $bot, $middle - 1);
        }
    }

}