<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Device Scanning</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	</head>
	</head>

	<body>
		<?php

		$scanOutput = shell_exec("bash /www/cyber-pizza/all/actions/scan/device_ports_status.sh topports");
		$topportAr = explode("\n", $scanOutput );

		for ($i = 0; $i < count($topportAr); $i++) {
			$topportAr[$i] = explode('/', $topportAr[$i]);
		}
		?>
		</div>
		
	</body>

</html>