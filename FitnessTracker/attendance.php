<?php
	//report errors while coding
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	//connect to database 
	session_start();

	echo "<!DOCTYPE html>";
	echo "<html>\n";
	echo "<head>\n";
		echo "<title>Attendace</title>\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes" />';
		echo '<link rel="stylesheet" type="text/css" href="w3.css">' . "\n";
		echo '<link rel="stylesheet" type="text/css" href="attendance-styles.css">';
		//include jQuery
		echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>'."\n";
		echo "<script src='attendance_script.js'></script>\n";
	echo "</head>\n";

	// 1 - What day is it?
	// 2 - Who is supposed to be here today?
	// 3 - Are there attendance records for today? If not, create records for the division for the day.
	// 4 - Update attendace as people show up/if you make some one present on accident change it. 
	// 5 - If we are looking at a day in the past, show records. 


	//logic - if today is Moday, $shedule = "MW"
	//if today is Wednesday, $scheudule = "MW" || "WF";
	$today = getdate();
	
	//Day should only be Mon, Wed or Friday

	//determine what "day" query day is...

	//$day = $today['weekday'];
	
	//$day = "Wednesday";

	if ($today['mon'] < 10){
			$month = '0'. $today['mon'];
	} else {$month = $today['mon'];}

	$date = $today['year'] ."-".$month."-".$today['mday'];

	if (!empty($_SERVER['QUERY_STRING'])){

		$date = $_SERVER['QUERY_STRING'];
		//DO VALIDATION ON QUERY_SRTING TO AVOID SQL PROBLEMS
		//DETERMINE IF WHAT DAY REQUESTED DATE IS, M W F?
		//$day = requested day

	}

	$day = date('l', strtotime($date));
	
	//echo $day;


	//SHOW USERS AND ATTENDANCE FOR A GIVEN DAY
	//echo $day;
	echo '<div class="w3-container">';
	echo '<h2>Attendance for '. $day .' | <span id="date_string">'. $date .'</span>';
	
	if (array_key_exists('user_name', $_SESSION) ) {
		echo ' | <span id="current_user">'. $_SESSION['user_name'] .'</span>';
	}
	
	echo '</h2>' ."\n";
	echo '</div>';
	$sql_1 = "SELECT * FROM `attendance` where `date` = '" . $date . "' ";

	//echo $sql_1;

	$sql_response_1 = run_query($sql_1);

	$present_members = array();

	foreach ($sql_response_1 as $key => $value) {		
		$pm = $value['username'];
		$status = $value['presence'];

		$present_members[$pm] = $status;
	} 

	/*foreach ($present_members as $j => $a) {
		echo "$j : $a";
	}*/

	
		//MON QUERY
		$sql_2 = "SELECT * FROM `Members` where `division` = 'N3I2' ";
	
	/*
	if ($day == "Wednesday"){
		//WED QUERY
		$sql_2 = "SELECT * FROM `Members` where `schedule`='M-W' OR `schedule`='W-F' ";
	}
	
	if ($day == "Friday"){
		//FRI QUERY
		$sql_2 = "SELECT * FROM `Members` where `schedule` = 'W-F' ";
		//echo 'SQL query for Friday<br>';
	}*/

	//SQL QUERY TO UPDATE A USER's ATTENDANCE ? another php script?

	/*echo $sql;
	echo "<br>";*/

	

	$sql_response_2 = run_query($sql_2);
	


	//Are we taking attendace, or just showing a list of people for a given day?
	echo "<br>";
	//echo $date;
	echo '<div class="w3-container">';
	echo "<form method='post' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>"."\n";
	echo "<table>"."\n";
	echo "<thead>";
		echo "<tr>";
			echo "<th>Present?</th>";
			echo "<th>Rank</th>";
			echo "<th>Name</th>";
		echo "</tr>";
	echo "</thead>";
	echo '<tbody>';

	foreach ($sql_response_2 as $row_key => $row_data) {
		
		if($row_key % 2 == 0){
			echo '<tr class="even-row">';
		} else {
			echo '<tr class="odd-row">';
		}

		/*foreach ($row_data as $key3 => $value3) {
			echo "<td id='$key3'>$value3</td>";
		}*/

			echo '<td ><input class="check_box" type="checkbox"  id="' . $row_data['username'] .'" name="member_attendance" value="' . $row_data['username'] .'" onchange="update_user_attendance(this.value)"';
			
			$un = $row_data['username'];
			check_attendance($un, $date);
			//SET DEFAULT TO checked FOR MEMBERS THAT ARE ALREAYD MARKED AS PRESENT
			if (array_key_exists($un, $present_members)){
				if ($present_members[$un] == 1){
					echo "checked";
				}
			}

			echo'></td>'."\n";
			echo "<td id='FirstName'>". $row_data['rank'] ."</td>\n";
			echo "<td id='LastName'>". $row_data['LastName'] ."</td>\n";
		echo "</tr>\n";
	}
	echo '</tbody>';
	echo "</table>"."\n";
	//echo "<br><input type='submit'><br>";
	echo "</form>"."\n";
	echo "</div>";
	echo "<div id='valid_user'></div>";
	echo "<div id='response_div'></div>";
	//echo "<div id='ajax_resonse'></div>";
	/*if ($_SERVER["REQUEST_METHOD"] == "POST"){

		echo "Division, POST! ";
		echo $_POST['member_attendance'];

	}*/

	function run_query($statement) {

		//$sql = $statement;

		//$sql_result;

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

		function check_attendance($username, $date){

		$sql = "SELECT * FROM `attendance` WHERE `username`='". $username ."' AND `date`='". $date ."' ";

		$current_attendance = run_query($sql);

			if (!empty($current_attendance)){

				echo "Record for found for $username ";
				//print_r($current_attendance);

			} else {
				$presence = "false";
				//echo "No record found for $username ";
				$sql = "INSERT INTO `attendance`(`username`, `date`, `presence`) VALUES ('".$username."','".$date."','".$presence."')";
				//echo $sql;
				$r = run_query($sql, 'false');
			}
		}

?>
</body>
</html>