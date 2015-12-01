<?php

	//report errors for debugging...
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	//include the custom functions library...
	include('./other/custom_functions.php');

	//include the MySQL database connection settings...
	include('DATABASE_CONNECTION.php');

	//get the filepath and split on '/', then use the current directory name as APP_NAME
	$file = dirname(__FILE__);
	$dir = explode('/', $file);
	
	define('APP_NAME', $dir[count($dir) - 1]);

	//echo APP_NAME;
	//echo "<br>";

	//print_r($dir);

	//echo "<br>";
	//echo server request URI

	$uri = parse_url($_SERVER['REQUEST_URI']);

	include('uri_handler.php');

	handleURI($uri);

	//print_r($uri);
	
?>