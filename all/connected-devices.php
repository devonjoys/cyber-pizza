<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connected Devices</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">

<!-- 		<style>
			.blinking{
					animation:blinkingText 1s infinite;
			}
			@keyframes blinkingText{
				0%{		color: #393939;	}
				49%{	color: transparent;	}
				50%{	color: transparent;	}
				99%{	color:#393939;	}
				100%{	color: #393939;	}
			}
		</style> -->

	</head>

	<body>

		<?php

		$scanPopOutput = shell_exec("bash /www/cyber-pizza/all/actions/scan/connected_devices.sh population");
		echo "<p style=\"color:#393939\" style=\"font-size:18px\"><span class=\"blinking\">{$scanPopOutput}</span>devices are connected</p>" ;
		?>

	</body>
	</html>