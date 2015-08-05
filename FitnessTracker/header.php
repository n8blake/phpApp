<?php

	class Header{

	public $title;

	function __construct($mytitle = APP_NAME){

		$this->title = $mytitle;

	}

	public function render(){


		echo "<!DOCTYPE html>\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "<title>". $this->title ."</title>\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes" />'."\n";
		echo '<link rel="stylesheet" type="text/css" href="styles.css">' . "\n";
		echo '<link rel="stylesheet" type="text/css" href="log_inout.css">' . "\n";
		echo '<link rel="stylesheet" type="text/css" href="font-awesome-4.4.0/css/font-awesome.css">' . "\n";
		echo '<script src="jquery-1.11.3.min.js"></script>'."\n";
		echo '<script src="index2-scripts.js"></script>'."\n";

		/*
		echo <<< "HTMLHEADER"
			<!DOCTYPE html>
			<html>
				<head>
					<title> $this->title </title>

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
		HTMLHEADER;
	*/
		echo "</head>\n";
		echo "<body>\n";

	}

	}

?>