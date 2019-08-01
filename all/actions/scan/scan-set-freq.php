<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="0;URL='../../scan.php'" />
		<title>Network Performance</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
	</head>

	<body>
		
		<?php  
		$info = $_POST["nmap"];
		echo($info);
		//incorporates the change of scanning frequency and writes it to scan.txt
		$fp = fopen("../../assets/settings/scan.txt", 'w+');
		fwrite($fp, $info);
		fclose($fp);
		//executes change of scanning frequency into cron
		shell_exec("/www/cyber-pizza/all/actions/scan/scan-set-cron.sh");
		?>

	</body>

</html>
