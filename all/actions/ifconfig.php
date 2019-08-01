<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>If Config</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">

	</head>
	

	<body>
		<?php
			//executes ifconfig.sh and stores the output
			$ifOutput = nl2br(shell_exec("bash /www/cyber-pizza/all/actions/settings/ifconfig.sh"));
			echo "<pre>$ifOutput</pre>" 

		?>
	</body>

</html>
