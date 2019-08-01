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
		//reads the current SSID for the network
		shell_exec("../actions/my-ssid.sh");
		$ssid_file ="../assets/settings/my-ssid.txt";
		$ssid_open = fopen($ssid_file, 'r');
		$my_ssid = fread($ssid_open, filesize($ssid_file));
		fclose($ssid_open);
	
		//reads the current Guardian Devil version
		$version_file = "../assets/settings/version.txt";
		$version_open = fopen($version_file, 'r');
		$my_version = fread($version_open, filesize($version_file));
		fclose($version_open);
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
    <h3 class="help-head">About</h3>

	<div class="help-content">
		<p class="answer">Guardian Devil is a personal network security device with three core functionalities in mind.</p>
		<br>
		<ul class="help-bull-li" style="list-style-type:circle;">
			<li><span class="a-setting">Security</span>&#8212Guardian Devil monitors your 
				network so you don't have to! All devices connected to it will be 
				subject to basic port scans and will take advantage of Guardian 
				Devil's malware blocker and threat intelligence feeds. You will be 
				notified if Guardian Devil detects suspicious activity on your 
				network.</li>
			<li><span class="a-setting">Ease of Use</span>&#8212Guardian Devil can be as 
				hands-on or as hands-free as you would like it to be. It scans your 
				network in the background, but it also provides in-depth summaries 
				of network statistics so that you can be more informed about what is 
				happening on your network. If you encounter a problem on your network 
				that you're not sure how to resolve, <a class="inline-link" href="contact.html">Contact Duke OIT</a> or see OIT's 
				regularly updated <a class="inline-link" href="help-home.php">Guardian Devil FAQ</a>.</li>
			<li><span class="a-setting">Resource Access</span>&#8212Guardian Devil offers 
				<a class="inline-link" href="../vpn.php">VPN</a> access so that you can use Duke's wealth of resources even when 
				you're at home! Any devices connected to Guardian Devil when VPN is 
				enabled will behave as if they were on Duke's main networks.</li>
		</ul>
		<br>
		<p class="a-note">Note: You must connect devices to your Guardian Devil's network (named <span class="a-setting"><?php echo $my_ssid;?></span>) to take advantage of its features on those devices.</p>
		<br>
		<p class="answer">Guardian Devil was originally designed by undergraduates during the 
			<a class="inline-link" href="https://codeplus.duke.edu/">Code+ Summer 2019 internship</a>. Your Guardian Devil runs on a <a class="inline-link" href="https://www.raspberrypi.org/products/raspberry-pi-3-model-b/">Raspberry Pi 
			Model 3B</a> using <a class="inline-link" href="https://openwrt.org">OpenWRT</a> and <a class="inline-link" href="https://ubuntu.com">Ubuntu</a> operating systems. The device leverages 
			several Open Source packages to deliver on its core functionalities. For a 
			list of packages, see <a class="inline-link" href="help-home.php#what-can-do">FAQ-What can Guardian Devil do?</a></p>
		<br>
		<p class="answer">Thank you for using the Guardian Devil!</p>
		<br>
		<p class="answer">Current Version:<br><?php echo nl2br($my_version);?></p>
		<br>
		<p class="more">More: <a class="inline-link" href="vpn.html">Help-VPN</a>, <a class="inline-link" href="legal.html">Legal</a></p>
	</div>

	</section>


    <footer class="row group container footer">

      <a class="footnote" href="../dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
