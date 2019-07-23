<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Cyber Pizza</title>
		<link rel="stylesheet" href="landing.css">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    		<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>
	<?php
        $initialized_file="all/assets/settings/initialized.txt";
        $initialized_open=fopen($initialized_file, 'r');
        $initialized=fread($initialized_open, filesize($initialized_file));
        fclose($initialized_open);
	if ($initialized=="1") {
                echo -e ("<meta http-equiv='Refresh' content='0; url=all/dash.php'/>");
                echo("hi");
        //} else {
        //        echo("Welcome to Guardian Devil!");
        }
        ?>

		<header class="row group container">
				<h1 class="logo">DCDP</h1>
				<div class="v-line"></div>
				<h2>Pizza Pi</h2>
				<nav class="user-in">
					<a href="all/dash.php">
						<h5 class="btn">login</h5>
					</a>
				</nav>
		</header>


		<p class="info">
			Please log in to make changes to the device.
		</p>




	</body>

</html>
