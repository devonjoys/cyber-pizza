<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Settings</title>
		<link rel="stylesheet" href="../../assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>

    

   <?php
      shell_exec("/www/cyber-pizza/all/actions/settings/reboot.sh");
   ?>
<meta http-equiv="refresh" content="0;URL='/www/cyber-pizza/all/settings.php'" />


	</body>

</html>
