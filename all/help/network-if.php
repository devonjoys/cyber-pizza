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
    <h3 class="help-head">Network Interface</h3>

	<div class="help-content">
		<p class="answer">This <a class="inline-link" href="/cgi-bin/luci">applet</a> allows you to make advanced changes to Guardian Devil's network via
			OpenWRT's <a class="inline-link" href="https://openwrt.org/docs/guide-user/luci/start">Luci</a> interface. This allows you to modify <a class="inline-link" href="/cgi-bin/luci/admin/network/dhcp">DNS/DHCP</a> settings, view <a class="inline-link" href="/cgi-bin/luci/admin/status/realtime">real-time graphs</a>, and make other changes. Some of these settings may take a few minutes to load.</p>
		<br>
		<h4 class="help-h">Status</h4>
		<p class="answer">This tab allows you to view current information about your system, including what processes are running and what has been logged. </p>
		<br>
		<h4 class="help-h">System</h4>
		<p class="answer">This tab allows you to view administrative information the software and core scripts of your device.</p>
		<br>
		<h4 class="help-h">Services</h4>
		<p class="answer">This tab allows you to view information about the add-on services, Adblock and OpenVPN.</p>
		<br>
		<h4 class="help-h">Network</h4>
		<p class="answer">This tab allows you to make advanced changes to your network, beyond those done on the <a class="inline-link" href="../settings.php">Settings</a> page.</p>
		<br>
		<p class="more">More: <a class="inline-link" href="help-home.php#faq">FAQ</a>, <a class="inline-link" href="help-home.php">OIT Guardian Devil FAQ</a></p>
	</div>

	</section>


    <footer class="row group container footer">

      <a class="footnote" href="../dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
