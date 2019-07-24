<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Settings</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>

    

   <?php
      $message1 = shell_exec("/www/cyber-pizza/all/actions/settings/new_ssid.sh {$_POST['net-name']}");
      $message2 = shell_exec("/www/cyber-pizza/all/actions/settings/new_net_pass.sh {$_POST['net-pass']} {$_POST['net-pass']}");
      echo $message1;
      echo $message2;
   ?>


	</body>

</html>
