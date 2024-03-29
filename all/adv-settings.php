<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Advanced Settings</title>
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
        <h2 class="page">Advanced Settings</h2>
	<a href='help/adv-settings.php' class='help-me' alt='To advanced settings help page'> ?
          <span class="tiptext">Help-Advanced Settings</span>
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
      if (! empty($_POST['freeze-it'])) {
        $freezename= './assets/settings/frozen.txt';
        $frozef = fopen($freezename, 'w+');
        flock($frozef, LOCK_EX);
        fwrite($frozef, '1');
        fclose($frozef);
        exec('./actions/settings/frozen.sh');
      }
      if (! empty($_POST['unfreeze-it'])) {
        $freezename= './assets/settings/frozen.txt';
        $frozef = fopen($freezename, 'w+');
        flock($frozef, LOCK_EX);
        fwrite($frozef, '0');
        fclose($frozef); 
        exec('./actions/settings/frozen.sh');
      }
      if (! empty($_POST['freeze-it'])) {
	exec('./actions/settings/reboot.sh');
      }
      if (! empty($_POST['reset-it'])) {
        exec('./actions/settings/factory-reset.sh');
      }
      if (! empty($_POST['update-it'])) {
        exec('./actions/settings/update.sh');
      }
      if (! empty($_POST['speed-it'])) {
        $new_serv = $_POST['new-speed-serv'];
        $speedname= './assets/settings/speed-server.txt';
        $speedf = fopen($speedname, 'w+');
        flock($speedf, LOCK_EX);
        fwrite($speedf, $new_serv);
        fclose($speedf); 
      }
      if (! empty($_POST['twitter-it'])) {
        $new_twit = $_POST['new-twit'];
        $twitname= './assets/settings/twitter.txt';
        $twitf = fopen($twitname, 'w+');
        flock($twitf, LOCK_EX);
        fwrite($twitf, $new_twit);
        fclose($twitf); 
      }

    ?>

    <?php
      $boot_f = "./assets/settings/last-boot.txt";
      $update_f = "./assets/settings/last-update.txt";
      $version_f = "./assets/settings/version.txt";

      $bf = fopen($boot_f, "r");
      $uf = fopen($update_f, "r");
      $vf = fopen($version_f, "r");

      $boot = fread($bf, filesize($boot_f));
      $update = fread($uf, filesize($update_f));
      $version = fread($vf, filesize($version_f));

      $twittername= './assets/settings/twitter.txt';
      $twitterf = fopen($twittername, 'r');
      $twitter_link = trim(fread($twitterf, filesize($twittername)));

      $servname= './assets/settings/speed-server.txt';
      $servef = fopen($servname, 'r');
      $speed_server = trim(fread($servef, filesize($servname)));

      $freezename= './assets/settings/frozen.txt';
      $frozef = fopen($freezename, 'r');
      $freeze_state = trim(fread($frozef, filesize($freezename)));
    ?>


    <section class="options-int">

      <h4 class="sett-tit">Advanced Settings</h4>

      <p><br>Last Boot: <?php echo $boot; ?></p>
      <p>Last Update: <?php echo $update; ?></p>
      <p>Current Version: <?php echo $version; ?></p>

      <form method='post' action='actions/settings/adv-set.php'>
	<br><p>Reboot the device. You will briefly lose network access.</p>
        <input type='submit' class='form-btn' name='reboot' value='Reboot'><br>
        
	<br><p>Freeze your network so that nothing can connect to the internet. You will still be able to connect to the web interface. You will briefly lose network access.</p>
	<?php
          if ($freeze_state) {
            echo "<input type='submit' class='form-btn' name='unfreeze' value='Unfreeze Network'>";
          } else {
            echo "<input type='submit' class='form-btn' name='freeze' value='Freeze Network'>";
          }
        ?>
	<br>
	<br><p>Generate and download a log file that can be used to troubleshoot problems with your device.</p>
        <input type='submit' class='form-btn' name='gen_debug' value='Generate Debug'><br>
	<br><p>Reset your Guardian Devil to as it was when you received it. Careful: This will overwrite any changes you have made and cannot be undone. </p>
        <input type='submit' class='form-btn' name='reset' value='Factory Reset'><br>
	<br><p>Manually update your Guardian Devil. It will be automatically updated on the 15th of every month. You will briefly lose network access. </p>
        <input type='submit' class='form-btn' name='update' value='Update Now'><br>
	<br><p>Change the server used to run speed tests. Current speed test server: <span class='a-setting'><?php echo $speed_server; ?></span> </p>
        <input type='submit' class='form-btn' name='ch-speed' value='Change Speed Test Server'><br>
	<br><p>Change the source for the Twitter feed on your dashboard. Current Twitter feed: <span><?php echo $twitter_link; ?></span> </p>
        <input type='submit' class='form-btn' name='twitter' value='Update Twitter Feed'><br>
      </form>

    </section>


    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
