<?php

	//If there is already a record, SELECT * FROM `attendance` WHERE id=`cangle` AND date=`2015-07-15`
	
	$q = $_GET['q'];

	//$json = $_POST['json'];

	if (!empty($q)){
		echo $q;
		echo "<br>";
	}
	//echo "Got something: <br>";
	if (!empty($_GET)){
		echo "GET: ";
		foreach ($_GET as $key => $value) {
			echo "$key : $value<br>";
		}
	}

	if (!empty($_POST)){
		//echo "POST: ";
		foreach ($_POST as $key => $value) {
			//echo "<span id='key'>$key</span>: <span id='value'>$value</span><br>";
			$json = json_decode($key);
			//var_dump($json);
			/*echo "<br>";
			echo $json->username;
			echo "<br>";
			echo $json->presence;
			echo "<br>";
			echo $json->date;*/
			update_member_presence($json);

		}
	}

	function update_member_presence($json){

		$sql = "UPDATE `attendance` SET `presence`='". $json->presence ."', `editing_user`='". $json->editing_user ."' WHERE `username`='". $json->username ."' AND `date`='". $json->date ."'";
		echo $sql;
		run_update_query($sql);
	}

	/*if (!empty($json)){
		echo "JSON not empty.";
		var_dump($json);
	}*/

	
	//If there is no record, INSERT INTO `attendance`(`username`, `date`, `presence`) VALUES ('cangle','2015-07-24','1')
	/*function check_attendance($username){

		$sql = "SELECT * FROM `attendance` WHERE `username`=". $username ." ";

		$current_attendance = run_query($sql);

		if (!empty($current_attendance)){

			echo "Record for found for $username : ";
			print_r($current_attendance);

		}

	}*/
	//If there are no records for a given day... create an empty day full of users who should be there...
	
	function create_new_blank_records($schedule){

	$sql = "SELECT * From `Members` where `schedule`=\'" . $schedule ."\'";

	

	}


	function run_update_query($statement) {

		//$sql = $statement;

		//$sql_result;

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

		/*if ($result->num_rows > 0) {
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        array_push($sql_result, $row);
		    }
			
			//return $sql_result;
		
		}*/
	}

?>