<?php

/**
 * Created by PhpStorm.
 * User: FelipeAndradee
 */

class timeinterval
{
    var $start_time;

    public function start(){
        global $start_time;
        list($usec, $sec) = explode(' ', microtime());
        $start_time = (float)$sec + (float)$usec;
    }

    public function stop(){
        global $start_time;
        list($usec, $sec) = explode(' ', microtime());
        $stop_time = (float)$sec + (float)$usec;
        return round($stop_time - $start_time, 8);
    }

}