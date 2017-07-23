<?php
/**
 * Created by PhpStorm.
 * User: FelipeAndradee
 */

include 'binary_search.php';
include 'time_interval.php';

$timeInterval = new timeinterval();

$files= array();

$path = 'test_files';
$dir = new DirectoryIterator($path);
foreach ($dir as $fileInfo) {
    $ext = strtolower( $fileInfo->getExtension() );
    if( $ext == 'txt' ) $files[] = $fileInfo->getFilename();
}

foreach ($files as $file){
    $numbers = array();
    $f = fopen($path."/".$file , "r");

    while (!feof($f)) {
        $numbers[] = explode('; ', fgets($f))[1];
    }

    fclose($f);

    sort($numbers, SORT_NUMERIC);

    echo "\n-----------------------\n";
    echo "filename: ".$file."\n";
    echo "iterative algorithm\n";

    $timeInterval->start();

    binary_search::iterative($numbers[0], $numbers);

    echo "duration time: ".$timeInterval->stop();
    echo "\nrecursive algorithm\n";

    $timeInterval->start();

    binary_search::recursive($numbers[0], $numbers, 0, sizeof($numbers) - 1);

    echo "duration time: ".$timeInterval->stop();
    echo "\n-----------------------\n";

}