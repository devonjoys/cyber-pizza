<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Help</title>
		<link rel="stylesheet" href="../assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>
    <?php
	shell_exec("../actions/my-ssid.sh");
	$ssid_file ="../assets/settings/my-ssid.txt";
	$ssid_open = fopen($ssid_file, 'r');
	$my_ssid = fread($ssid_open, filesize($ssid_file));
	fclose($ssid_open);
    ?>
    <header class="row group container">
        <a href="../dash.php">
           <img class="logo" src="../assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2 class="page">Help</h2>

        
        <nav class="set-btns">
        <ul>
          <li>
            <a href="help-home.php"><h5 class="btn">Help</h5></a>
          </li>
          <li>
            <a href="../settings.php"><h5 class="btn">Settings</h5></a>
          </li>
        </ul>
		</nav>

    </header>

    <section class="help-sec">
    <a class= "back" href="help-home.php">&larr;</a>
    <h3 class="help-head">Settings</h3>

	<div class="help-content">
		<p class="answer">The <a class="inline-link" href="../settings.php">Settings</a> page is where most changes are made to Guardian Devil's 
			functionality and output. On this page, you may change the notification 
			settings for receiving alerts about your network. You may also make some 
			system changes to the device, such as changing passwords. For other system 
			modifications, see <a class="inline-link" href="/cgi-bin/luci">Network Interface</a>.</p>
		<br>
		<h4 class="help-h">Notification Settings</h4>
		<p class="answer">By default, Guardian Devil will send you emails when certain activities happen on your network. You may change the types of notifications that you may receive, as well as add alternate email addresses to receive these notifications. You must always have one registered Duke email on your Guardian Devil.</p>
		<br>
		<p class="answer"Guardian Devil notifications will come from _PLACEHOLDER_@duke.edu, so make sure you have not blocked this address.</p> 
		<br>
		<h4 class="help-h">Change Password</h4>
		<p class="answer">Guardian Devil comes with two passwords: one so that you may connect to your network, and one so that you may make changes to your device. This way, a malicious actor who has connected to your network cannot make changes without knowing your admin password.</p>
		<br>
		<h4 class="help-h">Change SSID</h4>
		<p class="answer">Changing the SSID of your network will change how it appears when you try to connect to it from another device. Be careful when changing it, as all devices that have connected to your network will disconnect.</p>
		<br>
		<h4 class="help-h">Restart Device</h4>
		<p class="answer">This option reboots the Guardian Devil. The device and its web interface will come back online after about a minute.</p>
		<br>
		<h4 class="help-h">ifconfig</h4>
		<p class="answer">This option allows you to view the output of the Linux command <span class="a-note">ifconfig</span>.</p>
		<br>		
		<p class="more">More: <a class="inline-link" href="../adv-settings.php">Advanced Settings</a>, <a class="inline-link" href="adv-settings.php">Help-Advanced Settings</a></p>
	</div>

	</section>


    <footer class="row group container footer">

      <a class="footnote" href="../dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
