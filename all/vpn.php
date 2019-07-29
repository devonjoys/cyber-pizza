<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>VPN Access</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	
<?php
      $fname = "./actions/vpn/vpn_status.txt";
      exec("./actions/vpn/my-ip.sh");
      $fname2 = "./actions/vpn/my-ip.txt";
      $fp = fopen($fname, 'r');
      $fp2 = fopen($fname2, 'r');
      $vpn_on = trim(fread($fp, filesize($fname)));
      $vpn_ip = trim(fread($fp2, filesize($fname2)));
      fclose($fp);
      fclose($fp2);
	//echo $vpn_on;
        $out="checked";
	if ($vpn_on == "false") {
		$out="";
	} else {
		$out="checked";
	}
	
    ?>
	</head>

	<body>
<header class="row group container">
        <a href="dash.php">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2 class="page">VPN Access</h2>
	
        <nav class="set-btns">
        <ul>
          <li>
            <a href="help.html"><h5 class="btn">Help</h5></a>
          </li>
          <li>
            <a href="settings.php"><h5 class="btn">Settings</h5></a>
          </li>
        </ul>
        </nav>

    </header>



    <div class='vert-fill vpn-fill'>
      <div class="vpn-stuff options-int">
	       <p class="sett-tit">Turn VPN On/Off<br></p>
	       <form class="vpn-toggle" action="./actions/vpn/vpn_toggle.php" method="post">
        	<label class="switch">
           	<input type="checkbox" name="vpn" value="on" onchange="this.form.submit()" <?php echo $out ?>>
           	<span class="slider round"></span>
        	</label>
    	   </form>
    
    <p>Your network's current external-facing IP is: <span class="a-setting"><?php echo $vpn_ip ?></span></p>
    <p>For more information on OpenVPN, visit <a class="inline-link" href="help/vpn.html">Help-VPN</a></p>
    <p>To set up a VPN connection for the first time, visit <a class="inline-link" href="help/vpn-set-up.php">Help-VPN Set-Up</a></p>

    </div>
</div>
    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
