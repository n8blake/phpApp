<?php
	
	session_start();

	if (!empty($_SERVER['QUERY_STRING'])){

		$date = $_SERVER['QUERY_STRING'];


	} else {

		$today = getdate();
		if ($today['mon'] < 10){
			$month = '0'. $today['mon'];
		} else {$month = $today['mon'];}

		$date = $today['year'] ."-".$month."-".$today['mday'];
		}

	echo date('l', strtotime($date));
	echo "<br>";
	echo $date;

	if (!empty($_SESSION['username'])){
		echo $_SESSION['username'];
		echo "<br>";
	}

?>