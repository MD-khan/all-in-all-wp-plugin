<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="wrap"> 
		<h1> Well come to plugin</h1>
		<?php  settings_errors(); ?>

		<form method="post" action="options.php"> 
			<?php 
				settings_fields('taxi_service_options_group' );
				do_settings_sections('taxi_service_plugin');
				submit_button();
			?>
		</form>
	</div>

</body>
</html>