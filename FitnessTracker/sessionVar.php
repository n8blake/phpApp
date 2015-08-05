<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	session_start();

	foreach ($_SESSION as $key => $value){
		echo "$key : $value";
	}	

?>