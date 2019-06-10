<?php

/* this file include the paths of the directory in webfolder */


/* include paths: */

$temp_path = 'include/template/';
$func_path = 'include/function/';
$conf_path = 'include/config/';


/* layout paths: */

$css = 'layout/Css/';
$font = 'layout/fonts/';
$image = 'layout/image/';
$img = 'layout/img/';
$js = 'layout/js/';
$skitter = 'layout/skitter/';
$skitter_master = 'layout/skitter_master/';


include $conf_path.'connection.php';
include $temp_path.'header.php';
include $func_path.'func.php';
include $temp_path.'navbar.php';


?>
