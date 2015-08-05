<!DOCTYPE html>
<html>
	<head>
		<title>Fitness Tracker</title>

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" type="text/css" href="w3.css">
		<link rel="stylesheet" type="text/css" href="styles.css">



		<!--APP ICON LINKS-->
		<link href="http://blake-ink.com/navy/PT/apple-touch-icon.png" rel="apple-touch-icon" />
		<link href="http://blake-ink.com/navy/PT/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
		<link href="http://blake-ink.com/navy/PT/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
		<link href="http://blake-ink.com/navy/PT/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
		<link href="http://blake-ink.com/navy/PT/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
		<link href="http://blake-ink.com/navy/PT/icon-hires.png" rel="icon" sizes="192x192" />
		<link href="http://blake-ink.com/navy/PT/icon-normal.png" rel="icon" sizes="128x128" />
		<script type="text/javascript" src="/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	<body>

	<?php
		session_start();
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
			
		<?php
			
			if (!empty($_SESSION['user_name']) && ($_SESSION['user_is_logged_in'])){
				
				echo '<a id="login-user" href="login/">'. $_SESSION['user_name'] .'</a>';

			} else {
				echo '<a id="login-user" href="login/">Login</a>';
			}
			
		?>

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