<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 7/6/17
 * Time: 11:22 PM
 */

$numbers = array(2, 3, 5, 4, 6, 13, 46);

sort($numbers);

function binary_search_iterative($elem, $array){
    $top = sizeof($array) -1;
    $bot = 0;

    while($top >= $bot)
    {
        $p = floor(($top + $bot) / 2);
        if ($array[$p] < $elem)
            $bot = $p + 1;
        elseif ($array[$p] > $elem)
            $top = $p - 1;
        else
            return $p;
    }

    return $elem.' not found.';
}

echo binary_search_iterative(3, $numbers);



function binary_search_recursive($elem, $array, $bot, $top){
    $p = floor(($top + $bot) / 2);
    if($array[$p] == $elem)
        return $p;
    if($bot > $top)
        return $elem.' not found.';
    else {

        if ($array[$p] < $elem)
            return binary_search_recursive($elem, $array, $p + 1, $top);
        else
            return binary_search_recursive($elem, $array, $bot, $p - 1);
    }
}


echo "\n";
echo binary_search_recursive(13, $numbers, 0, sizeof($numbers) -1);