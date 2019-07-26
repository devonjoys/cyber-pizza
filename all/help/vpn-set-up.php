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
    <h3 class="help-head">VPN Set-Up</h3>
	<div class="help-content">
		<p class="answer">This guide explains how to set up a virtual machine and <a class="inline-link" href="vpn.html">VPN</a> connection.  This guide is also available on the <a class="inline-link" href="help-home.php">OIT website</a>.</p>
		<br>
		<p class="answer">Navigate to Duke's <a class="inline-link" href="https://vcm.duke.edu">Virtual Computing Manager</a> and log in. Select <span class="a-setting">Reserve a VM</span> and choose the newest version of <span class="a-setting">Ubuntu</span>.</p>
		<br>
		<p class="answer"><img src="../assets/images/Reserve_vm.JPG" alt="Reserve a VM on VCM page"><img src="../assets/images/Ubuntu.png" alt="Select the newest version of Ubuntu"></p>
		<br>
		<p class="answer">Once the virtual machine has finished building, make note of its <span class="a-setting">Hostname</span> on the left and <span class="a-setting">uncheck</span> automatic power downs.</p>
		<br>
		<p class="answer"><img src="../assets/images/VCM.png" alt="VCM Hostname and uncheck the automatic power down box"></p>
		<br>
		<p class="answer">Open your prefered terminal on your computer and run the following commands, following the prompts. The installation process should take less than 10 minutes.</p>
		<section class='options-int'><p class="code"><code>ssh netID@vcm-#####.vm.duke.edu 		</code>#Replace netID and ##### with your information. Use your normal Duke password.<code>
					<br>sudo su
					<br>curl https://raw.githubusercontent.com/TylerJang27/OpenVPNSetup/master/inner_script2.sh >> temp.sh
					<br>chmod +x temp.sh
					<br>./temp.sh	</code></p>
					<br><p class="answer">Wait for the scripts to run.<br></p>
					<br><p class="code"><code>exit
					<br>exit</code></p>
					<br><p class="answer">Make sure you are connected to Guardian Devil's network.</p>
					<br><p class="code"<code>scp netID@vcm-#####.vm.duke.edu:/home/client1.ovpn vpnclient.conf
					<br>scp vpnclient.conf root@10.42.0.1:/etc/openvpn/vpnclient.conf</code>   		</code>#Use the root password labeled on your device<code>
					</p></section>
		<p class="answer">Navigate to the <a class="inline-link" href="../vpn.php">VPN page</a> and enable VPN!</p>
		<br>
		<p class="answer">WARNING: This feature currently lacks ufw!!!</p>
		<br>
		<p class="more">More: <a class="inline-link" href="help-home.php">OIT Guardian Devil FAQ</a></p>
	</div>
	</section>
    <footer class="row group container footer">
      <a class="footnote" href="../dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="contact.html"><p class="footie btn">Contact DukeOIT</p></a>
    </footer>
	</body>
</html>
