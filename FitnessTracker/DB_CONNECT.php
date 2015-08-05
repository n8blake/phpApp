<?php
//PT location
//PT Leader
//PT date/time/temperature
	/*
	$username = "root";
	$password = "root";
	$host = "localhost:8889";
	$db = "";*/


		$sql_result;

		$user = 'root';
		$password = 'root';
		$db = 'myDB';
		$host = 'localhost';
		$port = 8889;

		$link = mysqli_init();

		$conn = new mysqli($host, $user, $password, $db);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
		$success = mysqli_real_connect(
		   $link, 
		   $host, 
		   $user, 
		   $password, 
		   $db,
		   $port
		);

		$date = "2015-07-24";

		$sql = 'SELECT * from `pt_schedule` WHERE `date`=\'' . $date . '\'';

		$result = $conn->query($sql);
		$sql_result = $result->fetch_assoc();
		
		//global $sql_result;

		

		function set_date($newdate){
			global $date;
			$date = $newdate;

		}



		

		function echo_leader() {
			global $sql_result;
			echo $sql_result['leader'];
		}

		function echo_location(){
			global $sql_result;
			echo $sql_result['location'];
		}

		//var_dump($sql_result);
		/*foreach ($newresult as $key => $value) {
			echo "$key : $value";
		}*/


?>