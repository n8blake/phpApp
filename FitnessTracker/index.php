<!DOCTYPE html>
<html>
	<head>
		<title>Fitness Tracker</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script type="text/javascript"></script>
	</head>
	<body>

	<?php

		include('weather.php');

	?>

		<h1>N3I2 PT Status</h1>

		<h2 class="info_header">PT Location: </h2>
		<p class="info">Medina Base</p>

		<h2 class="info_header">PT Leader: </h2>
		<p class="info" id="pt_leader">CTI3 Blake</p>

		<h2 class="info_header">The current Flag Condition: </h2>
		<?php echo '<p class="info" id="flag_color"> ' . $flag_condition .'</p>'; ?>

		<h2>The current temperature in San Antonio is: </h2>
		<?php echo '<p class="info" id="temp"> ' . $temperature .'</p>'; ?>
	</body>
</html>