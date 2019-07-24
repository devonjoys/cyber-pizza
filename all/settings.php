<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Help</title>
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
      echo "<li class='good-ip addr'> {$addr} </li>";
    }
    ?>
	</ul>

	<br>
	<p class="sett-text">Receiving notifications when</p>
	<ul>

	<?php 
		if (trim($notifs[0])) {
    		echo "<li> The system boots</li>";
    	}
    	if (trim($notifs[1])) {
    		echo "<li> A suspicious port is open</li>";
    	}
    	if (trim($notifs[2])) {
    		echo "<li> A new device connects to the network</li>";
    	}
    	if (trim($notifs[3])) {
    		echo "<li> Internet speed drops significantly</li>";
    	}
	?>

	</ul>



    </section>

    <section class="options-int">


    <a href="perf-change.html" class="inline-link edit-right">Change Frequency</a>
      <h4 class="sett-tit">Network Performance Preferences</h4>

      <p class="sett-text">
        <?php


          $fname = './assets/settings/performance.txt';
          $fp = fopen($fname, 'r');
          $freq = fread($fp, filesize($fname));
        ?>

        Network performance is checked <?php echo $freq; ?> times a day. 

<!--         <form action="perf-change.html" method="post">
          <input type="submit" name="opt-freq" value="Change Frequency">
        </form> -->

<!--         <a class= "inline-link" href="perf-change.html">Change Frequency</a> -->

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

        $w_pass = shell_exec("uci show wireless.default_radio0.key | cut -f2 -d \"'\"");
    	?>

      <p class="sett-text">
        Network name: <?php echo $ssid; ?> <br>
        Network password: <?php echo $w_pass; ?>
      </p>


    </section>

    <section class="options-int">

      <h4 class="sett-tit">Device Settings</h4>

      <a href="device-chng.php" class="inline-link edit-right">Change Device Password</a>

      <p class="sett-text">
        device name and password <br> ifconfig gen
      </p>



    </section>

    <a href="" class="inline-link">Advanced Settings</a>



    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
