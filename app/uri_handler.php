<?php

	//URI HANDLER

	function handleURI($_URI){

		$path = explode('/', $_URI['path']);

		//print_r($path);
		// Array ( [0] => [1] => php [2] => app [3] => controller [4] => action [5] => param )
		/*  URL SHOULD BE FORMATTED LIKE:
		*	(http://etc.com/ php /) / APP_NAME / CONTROLLER /  ACTION / PRAMETERS
		*	This will have to be adjusted based on your initial directory set up.
		*/

		$REQUESTED_CONTROLLER  = '';

		if (count($path) < 3){

			$REQUESTED_CONTROLLER = 'home';

		} elseif (count($path) == 3) {

			$REQUESTED_CONTROLLER = $path[3];

		} elseif (count($path) == 4) {

			$REQUESTED_CONTROLLER = $path[3];
			$REQUESTED_ACTION = $path[4];

		} elseif (count($path) >= 5) {

			$REQUESTED_CONTROLLER = $path[3];
			$REQUESTED_ACTION = $path[4];
			$REQUESTED_PARAMETERS = $path[5];

		} else {

			$REQUESTED_CONTROLLER = 'UNKNOWN';

		}

		if(isset($REQUESTED_CONTROLLER)){
			
			//echo "Requested Controller: $REQUESTED_CONTROLLER <br>";
			
			if(file_exists('./controllers/'. $REQUESTED_CONTROLLER .'.php')){
				//echo "Found $REQUESTED_CONTROLLER <br>";

				include './controllers/'. $REQUESTED_CONTROLLER .'.php';

			} else {

				include '.controllers/404.php';

			}

		} else {

			echo "No controller exits matching $REQUESTED_CONTROLLER <br>";

		}

	}

?>