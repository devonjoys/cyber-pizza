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
	<meta http-equiv='Refresh' content='0; url=../../device-chnge.php'/>
	</head>
	<body>

    
	
   <?php
      $message = shell_exec("./new_pass.sh {$_POST['old-pass']} {$_POST['new-pass1']} {$_POST['new-pass2']}");
      echo $message;
	shell_exec("touch /www/cyber-pizza/all/assets/{$message}");
      //checks whether admin password has been validated and changed
	if (substr(trim($message),0,4)=="Your") {
	//incorporates changes
	shell_exec("/etc/init.d/uhttpd restart");
      }
   ?>


	</body>

</html>
