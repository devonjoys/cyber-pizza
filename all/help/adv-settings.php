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
	</head>
	<body>
    	<?php
		//reads the current SSID for the device
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
    <h3 class="help-head">Advanced Settings</h3>

	<div class="help-content">
		<p class="answer"><a class="inline-link" href="../adv-settings.php">Advanced Settings</a> 
			allows you to make larger changes to your device, but with greater risk. All of these changes will prompt you for confirmation before taking effect.
			Only change these settings if you are aware of the implications.</p>
		<br>
		<p class="answer">Changes may also be made to your device via ssh to root, using the labeled password on your device, or via a manual input with a keyboard and monitor.</p>
		<br>
		<h4 class="help-h">System Info</h4>
		<p class="answer">This option displays useful diagnostic information about the device, including boot, update, and version information.</p>
		<br>
		<h4 class="help-h">Restart Device</h4>
		<p class="answer">This option reboots the Guardian Devil. It and the web interface will come back online after about a minute.</p>
		<br>
		<h4 class="help-h">Freeze/Unfreeze Network</h4>
		<p class="answer">This option allows you to cut off access to the Internet from the Guardian Devil and any connected devices. You will still be able to access the web interface, although you may have to refresh the page.</p>
		<br>
		<h4 class="help-h">Generate Debug Log</h4>
		<p class="answer">This option generates and downloads a log of diagnostic information on the device. OIT may request this information during the troubleshooting process.</p>
		<br>
		<h4 class="help-h">Factory Reset</h4>
		<p class="answer">This option will reset your device to the state it was in when you received it. Any changes you have made will be overwritten.</p>
		<br>
		<h4 class="help-h">Twitter Feed</h4>
		<p class="answer">This option will allow you to change the source of the Twitter Feed on the <a class="inline-link" href="../dash.php">Dashboard</a>.</p>
	</div>

	</section>


    <footer class="row group container footer">

      <a class="footnote" href="../dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
