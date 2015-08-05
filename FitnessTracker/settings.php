<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	
	echo "This is the settings page.";

	echo "<br>";

	if (!empty($_SESSION['user_name'])){
		echo $_SESSION['user_name'];
	} else {
		echo "You are not logged in.<br>\n";
	}
	//log in/out button

	

	if (!empty($_SESSION['user_is_logged_in'])){
		if ($_SESSION['user_is_logged_in'] == true){
			$login_button_id = "LogOut";
			$login_button_text = "Log Out";
		}
	} else {
		$login_button_id = "LogIn";
		$login_button_text = "Log In";
	}
	
	echo '<div id="settings_view">Settings View div</div>';

	echo '<button class="log_inout" id="'.$login_button_id.'" >';
	echo "$login_button_text";
	echo "</button>";

	

?>