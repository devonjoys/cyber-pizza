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
        $ssid_name = "./assets/settings/my-ssid.txt";
        $f = fopen($ssid_name, 'r');
        $ssid = fread($f, filesize($ssid_name));
        fclose($f);

        $w_pass = shell_exec("uci show wireless.default_radio0.key | cut -f2 -d \"'\"");
    ?>


    <section class="options-int">

      <h4 class="sett-tit">Network Preferences</h4>

      <p class="sett-text">Change the name and password of the Guardian Devil wireless network</p>

    


    <form method='post' action='./actions/settings/net-chng.php' target="pass-result">
        <br>Network Name: <input type="text" name="net-name" <?php echo "value='{$ssid}'"; ?> required>
        <br>Network Password: <input type="text" name="net-pass" <?php echo "value='{$w_pass}'"; ?> required>
        <br><br>
        <input type='submit' name='net-save' value='network save '>

        <iframe name="pass-result"></iframe>
    </form>

  </section>



    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
