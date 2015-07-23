<!DOCTYPE html>
<html>
	<head>
		<title>Fitness Tracker</title>
		<link rel="stylesheet" type="text/css" href="w3.css">
		<!--<link rel="stylesheet" type="text/css" href="styles.css">-->
		<script type="text/javascript"></script>
	</head>
	<body>

	<?php

		include('weather.php');
		include('DB_CONNECT.php');

	?>
		<header class="w3-container <?php echo $flag_condition ?>">
			<h1 >N3I2 PT Status</h1>
			<h2>For 
				<?php
				$today = getdate();
				echo $today['weekday'] ." ". $today['month'] ." ". $today['mday'] .", ". $today['year'];
				
				if ($today['mon'] < 10){
					$month = '0'. $today['mon'];
				} else {$month = $today['mon'];}

				$date = $today['year'] ."-".$month."-".$today['mday'];
				set_date($date);
				//print_r($today);
				?>
			</h2>
		</header>

		<div class="w3-container">
			<h3 class="info_header">PT Location: </h3>
			<p class="info"><?php 
				//Fetch info for PT leader here;
				echo_location();
				//echo "Medina";
			?>
			</p>
		</div>

		<div class="w3-container">
			<h3 class="info_header">PT Leader: </h3>
			<p class="info" id="pt_leader"> <?php 

				echo_leader();
	

			?> </p>
		</div>

		<div class="w3-container">
			<h3 class="info_header">The current Flag Condition: </h3>
			<?php echo '<p class="info" id="flag_color"> ' . $flag_condition .'</p>'; ?>
		</div>

		<div class="w3-container">
			<h3>The current temperature in San Antonio is: </h3>
			<?php echo '<p class="info" id="temp"> ' . $temperature .'</p>'; ?>
		</div>
	</body>
</html>