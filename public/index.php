<?php
session_start();

include_once "../vendor/autoload.php";
set();
function set(){
    $check = file_exists('../config.json');
    if($check!=false) {
        $keys = file_get_contents('../config.json');
        $keys = json_decode($keys);
        foreach ($keys as $key=>$val)
            define(strtoupper($key),$val);
    }
}

include_once "../routes/web.php";

