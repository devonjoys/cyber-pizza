<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connected Devices</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">

		<style>
			.blinking{
					animation:blinkingText 1s infinite;
			}
			@keyframes blinkingText{
				0%{		color: #000;	}
				49%{	color: transparent;	}
				50%{	color: transparent;	}
				99%{	color:#000;	}
				100%{	color: #000;	}
			}
		</style>

	</head>

	<body>

		<?php

		$scanPopOutput = shell_exec("bash /www/cyber-pizza/all/actions/scan/connected_devices.sh population");
		echo "<h3 style=\"color:black\"><span class=\"blinking\">{$scanPopOutput}</span>devices are connected</h3>" ;
		?>

	</body>
	</html>