<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	//verify user
	echo "Attempting to verify current user.";

	if (!empty($_GET)){

		foreach ($_GET as $key => $value){
			$user_to_check = htmlspecialchars($key);
		}

	}

	if (!empty($_POST)){

		foreach ($_POST as $key => $value){
			$user_to_check = htmlspecialchars($key);
		}

	}

	if(!empty($user_to_check)){
		check_user($user_to_check);
	}	

	function check_user($name){

		$sql = "SELECT * FROM `Members` WHERE `username`='". $name ."' AND `role`='admin'";

		run_query($sql);

	}

	function run_query($statement){
		$user = 'root';
		$password = 'root';
		$db = 'myDB';
		$host = 'localhost';
		$port = 8889;

		//$link = mysqli_init();

		$conn = new mysqli($host, $user, $password, $db);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 


		$result = $conn->query($statement);
		//$sql_result = $result->fetch_assoc();

		$sql_result = array();

		if ($result->num_rows > 0) {
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        array_push($sql_result, $row);
		    }
			
			return $sql_result;
		
		}
	}
?>