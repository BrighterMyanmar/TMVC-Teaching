<?php 

define("DB_HOST","localhost");
define("DB_NAME","bmmvc");
define("DB_USER","root");
define("DB_PASS","");

define("APPROOT",dirname(dirname(__FILE__)));
define("URLROOT","http://localhost/TMVC/");

function assets($file) {
    $file = ltrim($file,'/');
    echo URLROOT . "assets/" . $file;
}

function addView($file) {
    $file = ltrim($file,'/');
    $link = str_replace("/","\\",$file);
    require_once(APPROOT . "\\views\\" . $link . ".php");
}
function url($route){
    echo URLROOT . ltrim($route,"/");
}



