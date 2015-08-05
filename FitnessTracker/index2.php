<?php
	//report errors while coding
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	//let's MVC this bitch -- single view application
	//ajax to handle everything, so only one page gets loaded.
	define('APP_NAME', 'FitnessTracker');
	define('WEBROOT', 'localhost:8888');
	//start a session for the user
	session_start();

	//check if a user is logged in...




	
	//build the page
	//instanitate a page header
	include ('header.php');
	$header = new Header("My Title");

	$header->render();
	//instanitate a page body

?>

<div id="nav">
	<div id="buttons">
	<?php

		if (!empty($_SESSION['user_name']) && ($_SESSION['user_is_logged_in'])){			
		echo '<button id="today">Today</button>';
		echo '<button id="attendance">Attendance</button>';

	} 
	?>
	
	<button class="top-icon" id="today"></button>
	<button class="top-icon" id="settings"></button>
	
	</div>
</div>



<div id="content">

	yay content!



</div>


<?php

	//instantiate a page footer
	include ('footer.php');
	$footer = new Footer();
	$footer->render();
	//the end!

?>