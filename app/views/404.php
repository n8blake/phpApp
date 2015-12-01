<?php

	class Unknown_View {

		function __construct(){}

		public function render(){

			?>

				<div id="content" class="container">
					<div class="alert alert-danger">
						<strong>Error 404</strong>
						<p>The page you have requested could not be found. If you feel you have reached this page by mistake, please contact the system administrator.</p>
					</div>
				</div>

			<?php
		}
	}

?>