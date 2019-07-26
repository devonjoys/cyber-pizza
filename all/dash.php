<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Cyber Pizza</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	</head>
	<body>

		<header class="row group container">

				<a href="dash.php">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto alt="Duke Guardian Devil Logo">
         </a> 
        <div class="v-line"></div>
				<h2 class="page">Home</h2>

				<nav class="set-btns">
        <ul>
          <li>
            <a href="./help/help-home.php"><h5 class="btn">Help</h5></a>
          </li>
          <li>
            <a href="settings.php"><h5 class="btn">Settings</h5></a>
          </li>
        </ul>
				</nav>

		</header>



    <section class="int-face">


      <section class="dash">

        <div id="status">
<!--       <p class="stat">STATUS</p> -->

      <?php
        exec('/www/cyber-pizza/all/actions/my-adb.sh');
        exec('/www/cyber-pizza/all/actions/my-connection.sh');
        exec('/www/cyber-pizza/all/actions/my-vpn.sh');

        $adname = './assets/settings/my-adb.txt';
        $conname = './assets/settings/my-conn.txt';
        $vpnname = './assets/settings/my-vpn.txt';
	$twittername= './assets/settings/twitter.txt';

        $af = fopen($adname, 'r');
        $cf = fopen($conname, 'r');
        $vpnf = fopen($vpnname, 'r');
	$twitterf = fopen($twittername, 'r');

        $ad_stat = trim(fread($af, filesize($adname)));
        $con_stat = trim(fread($cf, filesize($conname)));
        $vpn_stat  = trim(fread($vpnf, filesize($vpnname)));
	$twitter_link = trim(fread($twitterf, filesize($twittername)));
        ?>
    

    <a class="stat" href="./help/dashboard.html#status-icons" alt="explanation page for device status icons">
      
        <?php
        if ($ad_stat) {
          echo "<img class='stat-img' src='./assets/images/status_adblock.png' alt='adblock status icon, adblock on'/>";
        } else {
          echo "<img class='stat-img' src='./assets/images/status_no_adblock.png' alt='adblock status icon, adblock off'/>";
        }
        if ($con_stat) {
          echo "<img class='stat-img' src='./assets/images/status_internet.png' alt='internet connection status icon, internet connected'/>";
        } else {
          echo "<img class='stat-img' src='./assets/images/status_no_internet.png' alt='internet connection status icon, internet not connected'/>";
        }
        if ($vpn_stat) {
          echo "<img class='stat-img' src='./assets/images/status_link.png' alt='VPN status icon, VPN on'/>";
        } else {
          echo "<img class='stat-img' src='./assets/images/status_no_link.png' alt='VPN status icon, VPN off'/>";
        }

	      fclose($af);
	      fclose($cf);
	      fclose($vpnf);
	      fclose($twitterf);
      ?>
    </a>

    <?php

    $scanPopOutput = shell_exec("bash /www/cyber-pizza/all/actions/scan/connected_devices.sh population");
    echo "<p class='devicestat'><span class='blinking'>{$scanPopOutput}</span>devices are connected</p>";
    ?>

    </div>

    <div class="apps">
        <div class="app-wrap">
        <div class="app">
          <a href="/cgi-bin/luci/admin/services/adblock">
          <div class="app-info">
            <img class="icon" src="./assets/images/adblock.png" alt="adblock app icon"/>
          </div>
          </a>
        </div>
            <h4>Adblock</h4>
        </div>

        <div class="app-wrap">
        <div class="app">
          <a href="performance.php">
          <div class="app-info">
            <img class="icon" src="./assets/images/graph2.png" alt="performance app icon depicting simple graph"/>
          </div>
          </a>
        </div>
            <h4>Performance</h4>
        </div>       

        <div class="app-wrap">
        <div class="app">
          <a href="firewall.php">
          <div class="app-info">
            <img class="icon" src="./assets/images/firewall.png" alt="firewall app icon depicting stylized firewall"/>
          </div>
          </a>
        </div>
            <h4>Firewall</h4>
        </div>

        <div class="app-wrap">
        <div class="app">
          <a href="vpn.php">
          <div class="app-info">
            <img class="icon" src="./assets/images/link.png" alt="VPN app icon depicting a chainlink"/>
          </div>
          </a>
        </div>
            <h4>VPN</h4>
        </div>

        <div class="app-wrap">
        <div class="app">
          <a href="../../cgi-bin/luci">
          <div class="app-info">
            <img class="icon" src="./assets/images/router.png" alt="router app icon depicting stylized router"/>
          </div>
          </a>
        </div>
            <h4>Router</h4>
        </div>

        <div class="app-wrap">
        <div class="app">
          <a href="scan.html">
          <div class="app-info">
            <img class="icon" src="./assets/images/eye.png" alt="scanning app icon depicting an eye"/>
          </div>
          </a>
        </div>
            <h4>Scanning</h4>
        </div>
      </div>

      </section>



      <section class="feed">
          <div class = "feed-title"><h3>Network Security Tips</h3></div>
          <div class="feed-body">
            <div class="feed-twitter">
              <a class="twitter-timeline" data-width="450" data-height="650" href=<?php echo $twitter_link;?>>Twitter Feed</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
               <!-- <a class="twitter-timeline" data-width="500" data-height="650" href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
            </div>
          </div>
      </section>
    
    </section>


    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
