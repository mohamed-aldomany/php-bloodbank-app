<?php

 function getTitle(){

  global $title;
  if (isset($title)) {
    echo $title;
  }else {
    echo "Default";
  }
}


/*******************************************************************************************/


function getMessage($themsg,$url=null,$secounds=5){

    if ($url==null) {
        $url = 'admin.php';
    }else{

        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!=='' ) {

            $url=$_SERVER['HTTP_REFERER'];
        }else{
            $url='index.php';
        }
    }

    echo "<h3 style='color: black; text-align: center;'>".$themsg.$secounds." secounds you will return to the page "."</h3>";
    header("refresh:$secounds;url=$url");

}



/**********************************************************************************************/


/*
*count the passed element in the database and return the numbers of it v1.0
*/

function countItem($column,$table){

    global $con;
    $stmt = $con->prepare("SELECT COUNT($column) FROM $table");
    $stmt->execute();
    return $stmt->fetchcolumn();
}

/* v2.0 */

function countItem_cond($column,$table,$column2,$value){

    global $con;
    $stmt = $con->prepare("SELECT COUNT($column) FROM $table WHERE $column2=$value");
    $stmt->execute();
    return $stmt->fetchcolumn();
}
/*********************************************************************************************/

/*
function get the latest users ,institution,messages,etc from database
*/
function latest($column,$table,$order,$limit=3){

    global $con;
    $stmt =$con->prepare("SELECT $column  FROM $table ORDER BY($order) DESC LIMIT $limit ");
    $stmt->execute();
    $row = $stmt->fetchall();
    return $row;
}


/******************************************************************************************/














?>
