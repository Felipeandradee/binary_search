<?php


$numbers = array();
$f = fopen("f10000_3.txt", "r");

// Lê cada uma das linhas do arquivo
while(!feof($f)) {
    $numbers[]= explode('; ', fgets($f))[1];
}

fclose($f);


//$numbers = array(2, 3, 4, 5, 6, 13, 46,55);

sort($numbers, SORT_NUMERIC);
//print_r($numbers);

function binary_search_iterative($elem, $array){
    $top = sizeof($array) -1;   //g(2, 0, 0)
    $bot = 0;                   //

    while($bot <= $top) //gr(0, 0, 1)
    {
        $middle = floor(($top + $bot) / 2); //ex(1, 2, 0)
        if ($elem == $array[$middle] ) { //ex(1, 0, 1)
            return $middle;
        }
        if ($elem < $array[$middle]) //ex(1, 0, 1)
            $top = $middle - 1; //ex(1, 1, 0)
        else
            $bot = $middle + 1; //ex(1, 1, 0)
    }

    return $elem.' not found.';
}


function binary_search_recursive($elem, $array, $bot, $top){
    $middle = floor(($top + $bot) / 2); // ex1(1, 2, 0)
    if($array[$middle] == $elem) //g1(1, 0, 1)
        return $middle;
    if($bot > $top) //g2(0, 0, 1)
        return $elem.' not found.';
    else {

        if ($array[$middle] < $elem) //g3(1, 0,1)
            return binary_search_recursive($elem, $array, $middle + 1, $top); //ex2(0, 1, 0)
        else
            return binary_search_recursive($elem, $array, $bot, $middle - 1); //ex2(0, 1, 0)
    }
}

echo binary_search_iterative(562849, $numbers);
echo "\n";
echo binary_search_recursive(562849, $numbers, 0, sizeof($numbers) -1);