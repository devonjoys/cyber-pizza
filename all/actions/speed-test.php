<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Network Performance</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	</head>
	</head>

	<body>

		<div class="speed-result">
		<?php  
		echo("This may take a moment...");
		shell_exec("/www/cyber-pizza/all/actions/performance/jsonparse.sh 1");
		sleep(20); //if time, add in an automatic grabber and wait here
		shell_exec("cp /mnt/mmcblk0p3/ubuntu/etc/speedtestprocessor/last_speed_test.txt /www/cyber-pizza/all/assets/data/last_speed_test.txt");
		echo(shell_exec("cat /www/cyber-pizza/all/assets/data/last_speed_test.txt"));

		?>
		</div>

	</body>

</html>
