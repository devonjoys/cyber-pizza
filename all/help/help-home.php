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
	$ssid_file = '../assets/settings/my-ssid.txt';
	$ssid_open = fopen($ssid_file, 'r');
	$my_ssid = fread($ssid_open, filesize($ssid_file));
	fclose($ssid_open);
    ?>
    <header class="row group container">
        <a href="../dash.html">
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

    <h2 class="help-tit" id="help-welc">Welcome to the Duke Guardian Devil Help Page</h2>
    <p class="help-caption">These help pages explain the purpose of the features of this device, how to use them, and some potential errors that cound be causing malfunctions. If a problem persists, please <a class="inline-link" href="contact.html">Contact Duke OIT</a>.</p>
    <div class="bar">
    	<h3 class="help-tit">Guides</h3>
	</div>
    <ul class="help-ul">
          <li class="help-li">
            <a class="help-btn" href="getting-started.php"><h5 class="help-btn">Getting Started</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="about.php"><h5 class="help-btn">About</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="contact.html"><h5 class="help-btn">Contact</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="network.php"><h5 class="help-btn">Network</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="dashboard.html"><h5 class="help-btn">Dashboard</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="settings.php"><h5 class="help-btn">Settings</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="adv-settings.php"><h5 class="help-btn">Advanced Settings</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="network-if.php"><h5 class="help-btn">Network Interface</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="performance.html"><h5 class="help-btn">Performance</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="scanning.html"><h5 class="help-btn">Scanning</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="vpn.html"><h5 class="help-btn">VPN</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="vpn-set-up.php"><h5 class="help-btn">VPN Set-Up</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="firewall.html"><h5 class="help-btn">Firewall</h5></a>
          </li>
          <li  class="help-li">
            <a class="help-btn" href="legal.html"><h5 class="help-btn">Legal</h5></a>
          </li>

    </ul>

    </section>

    <section class="help-sec">

    <div class="bar">
    	<h3 class="help-tit" id="faq">Frequently Asked Questions</h3>
	</div>

	<div class="help-content">



		<div class="q" id="what-can-do">
			<h4 class="question">What can Guardian Devil do?</h4>
			<p class="answer">Guardian Devil provides three core functionalities: security, ease of use, and VPN access to Duke resources. In summary, Guardian Devil uses:</p>
			<br><ul class="help-bull-li" style="list-style-type:circle;">
				<li><a class="inline-link" href="https://openwrt.org">OpenWRT</a> to provide network connectivity and firewall</li>
				<li><a class="inline-link" href="https://openwrt.org/docs/guide-user/services/ad-blocking">Advertisement blocking</a> to block advertisements and malware</li>
				<li><a class="inline-link" href="https://github.com/sivel/speedtest-cli">Speedtest-cli</a> to analyze network performance</li>
				<li><a class="inline-link" href="https://nmap.org">Nmap</a> to run port scans of connected devices</li>
				<li><a class="inline-link" href="https://openwrt.org/docs/guide-user/services/webserver/http.uhttpd">Uhttpd</a> to provide an easy-to-use interface</li>
			</ul>
			<br><p class="more">More: <a class="inline-link" href="about.php">About</a></p>
		</div>
		<div class="q" id="why-no-connect">
			<h4 class="question">Why wont my devices connect to the network?</h4>
			<p class="answer">Make sure that you are using Guardian Devil's SSID, <span class="a-setting"><?php echo $my_ssid; ?></span>, and that you are using your network password, not your admin password, to connect. If the problem persists, restart your network using the <a class="inline-link" href="../settings.php">Settings</a> page.</p>
			<br>
			<p class="answer">If devices still arent connecting, unplug Guardian Devil and plug it back in.</p>
			<br>
			<p class="more">More: <a class="inline-link" href="../../../cgi-bin/luci">Network Interface</a>, <a class="inline-link" href="contact.html">Contact</a></p>
		</div>
		<div class="q" id="why-2-pass">
			<h4 class="question">Why two different passwords?</h4>
			<p class="answer">Guardian Devil has a password for its network, <span class="a-setting"><?php echo $my_ssid; ?></span>, and for its admin interface. This ensures that devices that may have access to your network may not make changes to it without the admin password, offering an important extra layer of security.</p>
		</div>
		<div class="q" id="why-slow">
			<h4 class="question">Why is my internet speed slow?</h4>
			<p class="answer">Due to the extra layer of routing devices provided by Guardian Devil, your internet speeds may not be as fast as those on your normal home router. We are working to engineer a new Guardian Devil that can support greater internet speeds.</p>
			<br>
			<p class="answer">If VPN is enabled, your internet speed will decrease slightly due to the additional forwarding.</p>
			<br>
			<p class="more">More: <a class="inline-link" href="../performance.php">Performance</a>, <a class="inline-link" href="performance.html">Help-Performance</a>, <a class="inline-link" href="help-home.php">OIT Guardian Devil FAQ</a></p>
		</div>
		<div class="q" id="why-no-run">
			<h4 class="question">Why won't my applications run on the Guardian Devil network?</h4>
			<p class="answer">Because there are two layers of routing devices connected to your network, some services such as games may not be able to run when connected to Guardian Devil. This is called <a class="inline-link" href="https://kb.netgear.com/30186/What-is-Double-NAT">Double NAT</a>. In this case, consider using a different computer or moving your computer to your home router network.</p>
		</div>
		<div class="q" id="why-vpn-diff">
                        <h4 class="question">Why is Guardian Devil's VPN different from DukeVPN?</h4>
                        <p class="answer">To reduce traffic through Dukes original VPN, Guardian Devil requires that a new OpenVPN server be initialized on a Duke virtual machine. This will be different from existing DukeVPN software, but its end result will be mostly identical.</p>
                </div>
                <div class="q" id="why-ads">
                        <h4 class="question">Why are advertisements still showing?</h4>
                        <p class="answer">Ensure that you are connected to Guardian Devil's network and that the <a class="inline-link" href="/cgi-bin/luci/admin/services/adblock">Advertisement Blocker</a> is enabled and running.</p>
			<br>
			<p class="answer">While Guardian Devil's advertisement blocking software attempts to block as much as possible, sometimes some slip through, particularly advertisements embedded in other videos. You may, however, modify the blocklists using the <a class="inline-link" href="/cgi-bin/luci/admin/services/adblock">Advertisement Blocker</a>page.</p>
			<br>
			<p class="more">More: <a class="inline-link" href="../dashboard.html">Help-Dashboard</a>, <a class="inline-link" href="adblock.html">Help-Advertisement Blocker</a></p>
                </div>
                <div class="q" id="why-feedback">
                        <h4 class="question">How do I give feedback on Guardian Devil?</h4>
                        <p class="answer">We're glad you asked! Simply navigate to __PLACEHOLDER__, and you can fill out a Qualtrics survey detailing your experience with Guardian Devil.</p>
                </div>

	
<!--yolo-->


	</div>

	</section>


    <footer class="row group container footer">

      <a class="footnote" href="dash.html"> <p class="footie btn">Home</p></a>
      <a class="footnote" href=""><p class="footie btn">FAQ</p></a>
      <a class="footnote" href=""><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
