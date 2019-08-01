<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Settings</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>

    <header class="row group container">
        <a href="dash.php">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto alt="Duke Guardian Devil Logo">
           <div class="v-line"></div>
        </a> 
        <h2 class="page">Settings</h2>
	<a href='help/settings.php' class='help-me' alt='To settings help page'> ?
          <span class="tiptext">Help-Settings</span>
        </a>

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

    <?php 

	 if (! empty($_POST['save'])){
        exec('rm ./assets/settings/email.txt"');
        exec('cp ./assets/settings/email-temp.txt ./assets/settings/email.txt');

        $nname = "./assets/settings/notifications.txt";
        $nf = fopen($nname, 'w+');
        if (!empty($_POST['boot'])) {
        	fwrite($nf, "1\n"); 
        } else {
        	fwrite($nf, "0\n");
        }
        if (!empty($_POST['sus_port'])) {
        	fwrite($nf, "1\n"); 
        } else {
        	fwrite($nf, "0\n");
        }
        if (!empty($_POST['new_device'])) {
        	fwrite($nf, "1\n"); 
        } else {
        	fwrite($nf, "0\n");
        }
        if (!empty($_POST['drop'])) {
        	fwrite($nf, "1"); 
        } else {
        	fwrite($nf, "0");
        }

        fclose($nf);
    }

    if (! empty($_POST['cancel'])){
        exec('rm ./assets/settings/email-temp.txt"');
        exec('cp ./assets/settings/email.txt ./assets/settings/email-temp.txt');
    }

    ?>

    
    <div class="set-content">

    <section class="options-int">

      <h4 class="sett-tit">Email Preferences</h4>


     <a href="email-chng.php" class="inline-link edit-right">Edit Email Settings</a>
     <p class="sett-text">Emails below will receive notifications for the events you specify.</p>

    <ul>
    	
    <?php 

   


    $email_f = "./assets/settings/email.txt";
    $nname = "./assets/settings/notifications.txt";
    $ef = fopen($email_f, 'r');
    $nf = fopen($nname, 'r');

    $mail_contents = fread($ef, filesize($email_f));
    $emails = explode(",", $mail_contents);
    $duke_e = $emails[0];

    $notifs = array();
    while(! feof($nf)) {
        $ni = fgets($nf);
        $notifs[] = $ni;
      }

    fclose($ef);
    fclose($nf);


    foreach ($emails as $addr) {
      echo "<li class='addr'> {$addr} </li>";
    }
    ?>
	</ul>

	<br>
	<p class="sett-text">Receiving notifications when</p>
	<ul>

	<?php 
		if (trim($notifs[0])) {
    		echo "<li class='addr'> The system boots</li>";
    	}
    	if (trim($notifs[1])) {
    		echo "<li class='addr'> A suspicious port is open</li>";
    	}
    	if (trim($notifs[2])) {
    		echo "<li class='addr'> A new device connects to the network</li>";
    	}
    	if (trim($notifs[3])) {
    		echo "<li class='addr'> Internet speed drops significantly</li>";
    	}
	?>

	</ul>



    </section>

    <section class="options-int">
      <h4 class="sett-tit">Network Performance Preferences</h4>

    <a href="perf-change.html" class="inline-link edit-right">Change Frequency</a>

      <p class="sett-text">
        <?php


          $fname = './assets/settings/performance.txt';
          $fp = fopen($fname, 'r');
          $freq = fread($fp, filesize($fname));
        ?>

        Network performance is checked <span class='a-setting'><?php echo $freq; ?></span> times a day. 
      </p>


    </section>

<section class="options-int">
      <h4 class="sett-tit">Scan Preferences</h4>

    <a href="scan-change.html" class="inline-link edit-right">Change Frequency</a>

      <p class="sett-text">
        <?php


          $sname = './assets/settings/scan.txt';
          $sp = fopen($sname, 'r');
          $sreq = fread($sp, filesize($sname));
        ?>

        Guardian Devil runs scans <span class='a-setting'><?php echo $sreq; ?></span> times a week.
      </p>


    </section>

    <section class="options-int">

      <h4 class="sett-tit">Network Settings</h4>

      <a href="network-chng.php" class="inline-link edit-right">Change Network Settings</a>

    	<?php
        $ssid_name = "./assets/settings/my-ssid.txt";
        $f = fopen($ssid_name, 'r');
        $ssid = fread($f, filesize($ssid_name));
        fclose($f);

	$block_pass_name = "./assets/settings/block_pass.txt";
	$block_pass_file = fopen($block_pass_name, 'r');
	$block_pass=fread($block_pass_file, filesize($block_pass_name));
	fclose($block_pass_file);

        $w_pass = shell_exec("uci show wireless.default_radio0.key | cut -f2 -d \"'\"");
    	?>

      <p class="sett-text">
        Network name: <span class='a-setting'><?php echo $ssid; ?></span> <br>
        Network password: <span class='a-setting'><?php echo $w_pass; ?></span>
      </p>
	<form class="ifconfig_output" action="./actions/settings/troubleshoot.sh" method="post">
            <p class='sett-text'>Internet not working? <input class='form-btn' type="submit" alt="submit button to troubleshoot eth0" value="Troubleshoot eth0"></p>
      </form>


    </section>

    <section class="options-int">

      <h4 class="sett-tit">Device Settings</h4>

      <a href="device-chng.php" class="inline-link edit-right">Change Device Password</a>
	<p class="sett-text">Admin user: <span class='a-setting'>devil</span> <br>
	Admin password: <span class='a-setting'><?php echo $block_pass; ?></span>
	</p>
	<form class="ifconfig_output" action="./actions/settings/reboot.php" method="post">            
		<p class="sett-text">Reboot your device. <input class='form-btn' type="submit" alt="reboot button" value="Reboot Device"></p>
	</form>

  <script>

      function showLink() {
      var x = document.getElementById("downloadThis");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
      var y = document.getElementById("ifconfig_frame");
      if (y.style.display === "none") {
        y.style.display = "block";
      } else {
        y.style.display = "none";
      }
    } 

  </script>

      <form class="ifconfig_output" action="./actions/ifconfig.php" method="post" target="ifconfig_frame">
            <p class="sett-text" style="padding-top:0px;">Display the output of ifconfig. <input class='form-btn' type="submit" alt="submit button to show ifconfig output" value="See Your ifconfig" onclick="showLink()"></p>
      </form>

      <iframe name="ifconfig_frame" id="ifconfig_frame" height="250" width="500" style="display:none"></iframe> 

      <div id="downloadThis" style="display:none">
       <a href="./actions/settings/ifconfig.txt" download="ifconfig.txt">
          <br>Click Here to Download ifconfig</a>
      </div>

    
    </section>

    <a href="adv-settings.php" class="inline-link adv-link">Advanced Settings</a>
  </div>


    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
