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
		//Reads the current network SSID
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
    <h3 class="help-head">Network</h3>

	<div class="help-content">
		<p class="answer">This device broadcasts a wireless network in addition to the one 
			already broadcasted by your home router. Any devices connected to 
			<span class="a-setting"><?php echo $my_ssid;?></span> will benefit from its core functionalities. Make sure to only 
			connect trusted devices to Guardian Devil for best performance and security.</p>
		<br>
		<p class="answer">Most network settings may be modified via the OpenWRT <a class="inline-link" href="/cgi-bin/luci">Router Interface</a> 
			. Others may be modified on the <a class="inline-link" href="../settings.php">Settings</a> page.</p>
		<br>
		<p class="answer">In this version, Guardian Devil only offers a limited range of access, so you may be unable to use its network in some parts of your house.</p>
		<br>
		<p class="answer">You may experience slightly slower speeds than your router's main network, especially when connected to <a class="inline-link" href="../vpn.php">VPN</a>.</p>
		<br>
		<p class="more">More: <a class="inline-link" href="about.php">About</a>, <a class="inline-link" href="help-home.php">OIT Guardian Devil FAQ</a>, <a class="inline-link" href="help-home.php#why-slow">FAQ-Why is my internet speed slow?</a></p>
	</div>

	</section>


    <footer class="row group container footer">

      <a class="footnote" href="../dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
