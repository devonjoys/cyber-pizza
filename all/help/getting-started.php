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

	shell_exec("../actions/my-lan-ip.sh");
	$ip_file = "../assets/settings/my-lan-ip.txt";
	$ip_open = fopen($ip_file, 'r');
	$my_ip = fread($ip_open, filesize($ip_file));
	fclose($ip_open);
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
    <h3 class="help-head">Getting Started</h3>

	<div class="help-content">
		<h4 class="help-h">Summary</h4>
		<p class="answer">Welcome and thank you for trying out Guardian Devil! 
			Duke OIT has been hard at work designing a device that will offer 
			you a heightened level of network security, along with some other 
			features to improve your network experience. This device comes with 
			a built-in advertisement and malware blocker, VPN access to Duke 
			resources via OpenVPN, network port scanning, and statistics about 
			your home network. For additional information and assistance, see 
			<a class="inline-link" href="contact.html">Contact</a>. By using Guardian Devil, you agree to allow it to scan your 
			home network and device ports. This information will be stored locally; 
			however, a brief summary rating may be sent to Duke University for 
			authentication purposes.</p>
		<br>
		<h4 class="help-h">Setup</h4>
		<p class="answer">To initialize your Guardian Devil, connect it via an Ethernet cord 
			to your existing router. The device should connect automatically. Connect a laptop 
			or computer to your Guardian Devil's network, named <span class="a-setting"><?php echo $my_ssid;?></span> with the network password labeled on your device. 
			Then, type in <span class="a-setting"><?php echo $my_ip;?></span> into your browser's web address bar and log in with 
			the default admin credentials <span class='a-setting'>devil</span> and admin password <span class='a-setting'>TrueBlueForever2019</span>. After entering your 
			Duke email, hit the Accept button on the login page and click on the Guardian devil 
			logo at the top.</p>
		<br>
		<p class="answer">Navigate to the <a class="inline-link" href="../settings.php">Settings</a> page and change your network password and 
			admin password. If you have initial connection problems, see the "Troubleshoot 
			eth0" option on <a class="inline-link" href="../settings.php">Settings</a>.</p>
		<br>
		<p class="answer">You should now be able to use your Guardian Devil to increase your 
			network security and peace of mind. Connect additional trusted devices to its 
			network to take advantage of its features. If you require assistance, see the 
			other <a class="inline-link" href="help-home.php">Help</a> pages or <a class="inline-link" href="contact.html">Contact Duke OIT</a>.</p>
		<br>
		<p class="more">More: <a class="inline-link" href="../settings.php">Settings</a>, <a class="inline-link" href="settings.php">Help-Settings</a>, <a class="inline-link" href="help-home.php">OIT Guardian Devil FAQ</a>, <a class="inline-link" href="help-home.php#why-2-pass">FAQ-Why two different passwords?</a></p>
	</div>

	</section>


    <footer class="row group container footer">

      <a class="footnote" href="../dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
