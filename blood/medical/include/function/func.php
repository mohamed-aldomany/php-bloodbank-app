<?php


function getMessage($themsg,$url=null,$secounds=5){

    if ($url==null) {
        $url = 'home_medical.php';
    }else{

        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!=='' ) {

            $url=$_SERVER['HTTP_REFERER'];
        }else{
            $url='home_medical.php';
        }
    }

    echo "<h3 style='color: black; text-align: center;'>".$themsg.$secounds."secounds you will return to the main page "."</h3>";
    header("refresh:$secounds;url=$url");

}




?>
