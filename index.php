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
		$login_errors_file="all/assets/settings/login_errors.txt";
		$login_errors_open=fopen($login_errors_file, 'r');
		$login_errors=fread($login_errors_open, filesize($login_errors_file));
		fclose($login_errors_open);
        ?>
		<link rel="stylesheet" href="./all/assets/stylesheets/main.css">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    		<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>

		<header class="row group container">
				
           <img class="logo" src="./all/assets/images/dgd.png" width="200px" height=auto alt="Duke Guardian Devil Logo">

			<nav>
        	<ul>
        	  <li>
        	    <a href="all/dash.php"><h5 style="color:#012169;">login</h5></a>
        	  </li>
    	    </ul>
    		</nav>

		</header>

		<h2 class="welc-tit">Welcome to Guardian Devil</h2>
		<p class="welc-cap">Before getting started with your home network security device, you must set a custom SSID, passwords, and device settings.</p>

		<section class="options-int">

			<h4 class="sett-tit">Setup</h4>

			<form method='post' action='./all/actions/settings/initialize.php'>
	<br><r>NetID: <input type="text" name="netID" required>
		<p class="error"><?php
		if (substr($login_errors, 0, 1)=="0") {
                       echo "";
                } else {
                       echo "Please input a valid NetID.<br>";
		}?></p>

	<br>User name: devil <br> <br>
		Enter new admin password: <input type="password" name="new-pass1" required>
        <br>	Re-enter new admin password: <input type="password" name="new-pass2" required>
		<p class="error"><?php
			if (substr($login_errors, 2, 1)=="0") {
				echo "";
			} elseif (substr($login_errors, 2, 1)=="1") {
				echo "Please input a valid password.<br>";
			} elseif (substr($login_errors, 2, 1)=="2") {
				echo "Please enter a password with at least 8 characters.<br>";
			} elseif (substr($login_errors, 2, 1)=="3") {
				echo "Please enter a password with less than 32 characters.<br>";
			} elseif (substr($login_errors, 2, 1)=="4") {
				echo "Passwords do not match.<br>";
			} else {
				echo "Unknown error.<br>";
			}
		?></p>
	<br>Network SSID: <input type="text" name="new_ssid" required>
		<p class="error"><?php
                        if (substr($login_errors, 4, 1)=="0") {
                                echo "";
                        } elseif (substr($login_errors, 4, 1)=="1") {
                                echo "Please input a valid ssid.<br>";
                        } elseif (substr($login_errors, 4, 1)=="2") {
                                echo "Please enter an SSID with at least 3 characters.<br>";
                        } elseif (substr($login_errors, 4, 1)=="3") {
                                echo "Please enter an SSID with less than 32 characters.<br>";
                        } else {
                                echo "Unknown error.<br>";
                        }
                ?></p>
	<br>
	<br>Enter new network password: <input type="password" name="new-net-pass1" required>
	<br>	Re-enter new network password: <input type="password" name="new-net-pass2" required>
		<p class="error"><?php
                        if (substr($login_errors, 6, 1)=="0") {
                                echo "";
                        } elseif (substr($login_errors, 6, 1)=="1") {
                                echo "Please input a valid network password.<br>";
                        } elseif (substr($login_errors, 6, 1)=="2") {
                                echo "Please enter a network password with at least 8 characters.<br>";
                        } elseif (substr($login_errors, 6, 1)=="3") {
                                echo "Please enter a network password with less than 32 characters.<br>";
                        } elseif (substr($login_errors, 6, 1)=="4") {
                                echo "Network passwords do not match.<br>";
                        } else {
                                echo "Unknown error.<br>";
                        }
                ?></p>
	<br>
	<br>	Please select frequency of speed testing:
		<br><select name="freq">
			<option value="0">Never</option>
			<option value "2">2 Times a Day</option>
			<option value "6">6 Times a Day</option>
			<option value "12">12 Times a Day</option>
		</select>
	<br>
	<br>	Please select frequency of port scanning:
		<br><select name="nmap">
			<option value="0">Never</option>
                        <option value "1">Every Day</option>
                        <option value "3">2 Times a Week</option>
                        <option value "7">1 Time a Week</option>
                </select>
        <br>
	<br>	<p class="a-note">By using this device, you agree to have Guardian Devil conduct port scans of your network devices.</p>

	<br>
        <input type='submit' class='sub-canc' name='init' value='Finish'>
        <iframe name="pass-result" style='display:none;'></iframe>
    </form>

		</section>


	<footer class="row group container footer">

      <a class="footnote" href="index.php"> <p class="footie btn">Home</p></a>
     <!-- <a class="footnote" href=""><p class="footie btn">FAQ</p></a> -->
      <a class="footnote" href="contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>




	</body>

</html>
