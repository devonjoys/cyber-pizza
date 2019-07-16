<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="0;URL='./performance'" />
		<title>Network Performance</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
	</head>

	<body>

		<?php  
		$info = $_POST["freq"];
		echo($info);

		$fp = fopen("../assets/settings/performance.txt", 'w+');
		fwrite($fp, $info);
		fclose($fp);
		?>

	</body>

</html>
