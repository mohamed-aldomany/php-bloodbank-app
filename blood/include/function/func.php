<?php
	

function getMessage($themsg,$url=null,$secounds=5){

	if ($url==null) {
		$url = 'index.php';
	}else{

		if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!=='' ) {
			
			$url=$_SERVER['HTTP_REFERER'];
		}else{
			$url='index.php';
		}
	}

	echo "<h3 style='color: black; text-align: center;'>".$themsg.$secounds."secounds you will return to the main page "."</h3>";
	header("refresh:$secounds;url=$url");

}




?>