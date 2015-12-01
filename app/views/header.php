<?php

	class Header {

		public $css_files = array();
		public $js_files = array();
		public $title = APP_NAME;

		function __construct(){

		}

		public function render(){

			?>

			<!DOCTYPE html>
			<html lang="en">
			
			<head>
				<title></title>
				<meta charset="utf-8">
  				<meta name="viewport" content="width=device-width, initial-scale=1">

  				<!--include Bootstrap and jQuery on all pages-->
  				
  				<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>/resources/bs/css/bootstrap.min.css">
  				<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>/resources/css/styles.css">
  				<?php
  				//include all additional css files 
  					foreach ($this->css_files as $file_name) {
  						echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/resources/css/'. $file_name . '">';
  					}
  				?>

  				<script type="text/javascript" src="<?php echo BASE_URL ?>/resources/bs/js/bootstrap.min.js"></script>
  				<?php
  				//include all additional js files 
  					foreach ($this->js_files as $file_name) {
  						echo '<script type="text/javascript" src="' . BASE_URL . '/resources/js/'. $file_name . '">';
  					}
  				?>


			</head>

			<body>

			<?php

		}

	}

?>