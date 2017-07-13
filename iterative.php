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

    while($bot <= $top)
    {
        $middle = floor(($top + $bot) / 2);
        if ($elem == $array[$middle] ) {
            return $middle;
        }
        if ($elem < $array[$middle])
            $middle  = $top - 1;
        else
            $middle = $bot + 1;        
    }

    return $elem.' not found.';
}

echo binary_search_iterative(3, $numbers);



function binary_search_recursive($elem, $array, $bot, $top){
    $middle = floor(($top + $bot) / 2);
    if($array[$middle] == $elem)
        return $middle;
    if($bot >= $top)
        return $elem.' not found.';
    else {

        if ($array[$middle] < $elem)
            return binary_search_recursive($elem, $array, $middle + 1, $top);
        else
            return binary_search_recursive($elem, $array, $bot, $middle - 1);
    }
}


echo "\n";
echo binary_search_recursive(13, $numbers, 0, sizeof($numbers) -1);
