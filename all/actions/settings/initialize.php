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
	<meta http-equiv="refresh" content="0;URL='/cyber-pizza/index.php'"/>
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>

    
<!-- Runs in the context of login to set new passwords, settings, etc. Tests using login_errors whether or not input is valid -->
   <?php
      shell_exec("./new_netid.sh {$_POST['netID']}");
      shell_exec("./new_pass.sh pepperoni {$_POST['new-pass1']} {$_POST['new-pass2']}");
      shell_exec("./new_ssid.sh {$_POST['new_ssid']}");
      shell_exec("./new_net_pass.sh {$_POST['new-net-pass1']} {$_POST['new-net-pass2']}");
	$info = $_POST["freq"];
	$fp = fopen("../../assets/settings/performance.txt", 'w+');
	fwrite($fp, $info);
	fclose($fp);
	shell_exec("/www/cyber-pizza/all/actions/performance/perf-set-cron.sh");	
	$info = $_POST["nmap"];
	$fp = fopen("../../assets/settings/nmap_freq.txt", 'w+');
	fwrite($fp, $info);
	fclose($fp);
	shell_exec("/www/cyber-pizza/all/actions/scan/scan-set-cron.sh");	
	
	$login_errors_file="/www/cyber-pizza/all/assets/settings/login_errors.txt";
	$login_errors_open=fopen($login_errors_file, 'r');
	$login_errors=fread($login_errors_open, filesize($login_errors_file));
	if (substr($login_errors, 0, 1) == "0" && substr($login_errors, 2, 1) == "0" && substr($login_errors, 4, 1) =="0" && substr($login_errors, 6, 1) == "0") {
		shell_exec("touch /www/cyber-pizza/all/assets/initialized_temp.txt");
		shell_exec("echo 1 >> /www/cyber-pizza/all/assets/initialized_temp.txt");
		shell_exec("mv /www/cyber-pizza/all/assets/initialized_temp.txt /www/cyber-pizza/all/assets/initialized.txt");
		shell_exec("sleep 1");
		shell_exec("/etc/init.d/network restart");
		shell_exec("/etc/init.d/uhttpd restart");
	} else {
		shell_exec("touch /www/cyber-pizza/all/assets/initialized_temp.txt");
		shell_exec("echo 0 >> /www/cyber-pizza/all/assets/initialized_temp.txt");
		shell_exec("mv /www/cyber-pizza/all/assets/initialized_temp.txt /www/cyber-pizza/all/assets/initialized.txt");
	}
   ?>


	</body>

</html>
