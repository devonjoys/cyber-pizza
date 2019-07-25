<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Cyber Pizza</title>
		<?php
    	    $initialized_file="all/assets/settings/initialized.txt";
    		$initialized_open=fopen($initialized_file, 'r');
        	$initialized=fread($initialized_open, filesize($initialized_file));
        	fclose($initialized_open);
			if ($initialized=="1") {
                echo ("<meta http-equiv='Refresh' content='0; url=all/dash.php'/>");
        	}
        ?>
		<link rel="stylesheet" href="./all/assets/stylesheets/main.css">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    		<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>

		<header class="row group container">
				
           <img class="logo" src="./all/assets/images/dgd.png" width="200px" height=auto alt="Duke Guardian Devil Logo">

			<nav class="set-btns">
        	<ul>
        	  <li>
        	    <a href="all/dash.php"><h5 class="btn">login</h5></a>
        	  </li>
    	    </ul>
    		</nav>

		</header>

		<h2 class="welc-tit">Welcome to Guardian Devil</h2>
		<p class="welc-cap">Before getting started with your home network protection device you will need to change the password for the device, name your network, and choose what features you wish to use.</p>

		<section class="options-int">

			<h4 class="sett-tit">Setup</h4>

			<form method='post' action='./actions/settings/dev-pass-chng.php' target="pass-result">
        <br><br>User name: devil <br> <br>
		Enter new password: <input type="password" name="new-pass1" required>
        <br>Re-enter new password: <input type="password" name="new-pass2" required>
        <br><br>
        <input type='submit' name='init' value='Finish'>

        <iframe name="pass-result"></iframe>
    </form>

		</section>


	<footer class="row group container footer">

      <a class="footnote" href="dash.html"> <p class="footie btn">Home</p></a>
      <a class="footnote" href=""><p class="footie btn">FAQ</p></a>
      <a class="footnote" href=""><p class="footie btn">Contact DukeOIT</p></a>

    </footer>




	</body>

</html>
