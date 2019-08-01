<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Advanced Settings</title>
		<link rel="stylesheet" href="../../assets/stylesheets/main.css">
    		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	</head>
	<body>

    <header class="row group container">
        <a href="../../dash.php"><img class="logo" src="../../assets/images/dgd.png" width="200px" height=auto alt="Duke Guardian Devil Logo"></a>
        <div class="v-line"></div>
        <h2 class="page">Advanced Settings</h2>

        <nav class="set-btns">
        <ul>
          <li>
            <a href="../../help/help-home.php#faq"><h5 class="btn">Help</h5></a>
          </li>
          <li>
            <a href="../../settings.php"><h5 class="btn">Settings</h5></a>
          </li>
        </ul>
        </nav>
    </header>

    <?php
      //handles Post input to display appropriate editing page
	$reboot = $_POST['reboot'];
      	$freeze = $_POST['freeze'];
      	$unfreeze = $_POST['unfreeze'];
      	$gen_debug = $_POST['gen_debug'];
      	$reset = $_POST['reset'];
      	$update = $_POST['update'];
      	$speed = $_POST['ch-speed'];
      	$twitt = $_POST['twitter'];
    ?>

    <section class="options-int">

    <?php
	//display of reboot option
      if (! empty($reboot)) {
        echo "<h4 class='sett-tit'>Reboot Device?</h4>";
        echo "<a href='../../adv-settings.php' class='inline-link edit-right'>Back to Advanced Settings</a>";
	echo "<form method='post' action='../../adv-settings.php'>
            <p class='warn'>Are you sure you want to reboot the device? This may take up to 5 minutes, and you will temporarily lose connection.</p>
            <br><input type='submit' class='sub-canc' name='reboot-it' value='Yes, reboot the device'>
         </form>";
      }
	//display of freeze option
      if (! empty($freeze)) {
        echo "<h4 class='sett-tit'>Freeze Network?</h4>";
        echo "<a href='../../adv-settings.php' class='inline-link edit-right'>Back to Advanced Settings</a>";

        echo "
          <p class='warn'> Freezing the network will halt all traffic in to or out of your home network. Internal communication will still be allowed, so you will not lose access to the device. <br><br> </p>";
        echo "
          <form method='post' action='../../adv-settings.php'>
            Are you sure you want to freeze the network?
            <br><input type='submit' class='sub-canc' name='freeze-it' value='Yes, freeze the network'>
          </form>
        ";
      }
      if (! empty($unfreeze)) {
        echo "<h4 class='sett-tit'>Unfreeze Network?</h4>";
        echo "<a href='../../adv-settings.php' class='inline-link edit-right'>Back to Advanced Settings</a>";

        echo "
          <p class='warn'> Unfreezing the network will resume all traffic in to or out of your home network. <br><br> </p>";
        echo "
          <form method='post' action='../../adv-settings.php'>
            Are you sure you want to unfreeze the network?
            <br><input type='submit' class='sub-canc' name='unfreeze-it' value='Yes, unfreeze the network'>
          </form>
        ";
      }
	//display of generate debug option
      if (! empty($gen_debug)) {
        echo "<h4 class='sett-tit'>Debug Generated<br></h4>";
        echo "<a href='../../adv-settings.php' class='inline-link edit-right'>Back to Advanced Settings</a>";
        exec("./gen_debug.sh");
        #echo "<input class='sub-canc' href='../../assets/settings/debug.txt' download='debug.txt' val='Download Debug File'>";
	echo "<br><a href='../../assets/settings/debug.txt'><p class='sub-canc to-edit'>Download Debug File</p></a>";
      }
	//display of reset option
      if (! empty($reset)) {
        echo "<h4 class='sett-tit'>Factory Reset?</h4>";
        echo "<a href='../../adv-settings.php' class='inline-link edit-right'>Back to Advanced Settings</a>";

        echo "
          <p class='warn'> WARNING: if you reset the device back to factory settings all of your configurations for the Guardian Devil will be lost. Any devices currently connected will need to be reconnected. <br><br> </p>";
        echo "
          <form method='post' action='../../adv-settings.php'>
            Are you sure you want to reset the device?
            <br><input type='submit' class='sub-canc' name='reset-it' value='Yes, reset the device to factory settings'>
          </form>
        ";
      }
	//display of update option
      if (! empty($update)) {
        echo "<h4 class='sett-tit'>Update Packages?</h4>";
        echo "<a href='../../adv-settings.php' class='inline-link edit-right'>Back to Advanced Settings</a>";
        echo " <p class='warn'>Running this update will update the packages used by Guardian Devil and pull from the Git repository for the web interface.<br><br> </p>";
        echo "
          <form method='post' action='../../adv-settings.php'>
            <p>Continue?</p>
            <br><input type='submit' class='sub-canc' name='update-it' value='Yes, update the device'>
          </form>
        ";
      }
	//display of changing speed test server option
      if (! empty($speed)) {
        $speedname='../../assets/settings/speed-server.txt';
	$speedf = fopen($speedname, 'r');
	$speed_serv = trim(fread($speedf, filesize($speedname)));
	fclose($speedf);

	echo "<h4 class='sett-tit'>Change Speed Test Server?</h4>";
        echo "<a href='../../adv-settings.php' class='inline-link edit-right'>Back to Advanced Settings</a>";
        echo "<p class='warn'>Change the server used to run the speed test. The codes for a selection of server locations are provided below. </p>";
	
	//displays table of common speed test servers
	echo "
		<br>
    <table class='server-table'>
		<tr>
			<th class='col-label'><p class='col-label'>Server</p></th>
			<th class='col-label'><p class='col-label'>Location</p></th>
		</tr>
		<tr>
			<td class='server-td'>4185</td>
			<td class='server-td'>Duke</td>
		</tr>
		<tr>
			<td class='server-td'>16970</td>
			<td class='server-td'>Durham, NC</td>
		</tr>
		<tr>
			<td class='server-td'>14774</td>
			<td class='server-td'>Chapel Hill, NC</td>
		</tr>
		<tr>
			<td class='server-td'>14148</td>
			<td class='server-td'>Rochester, NY</td>
		</tr>
		<tr>
			<td class='server-td'>1776</td>
			<td class='server-td'>Chicago, IL</td>
		</tr>
		<tr>
			<td class='server-td'>1783</td>
			<td class='server-td'>San Francisco, CA</td>
		</tr></table>
		</p></div><br>";

        
        echo "
          <form method='post' action='../../adv-settings.php'>
            <input type='text' name='new-speed-serv' value='{$speed_serv}'>
            <br><input type='submit' class='form-btn' name='speed-it' value='Use this server'>
          </form>
        ";
      }
	//displays changing twitter feed option
      if (! empty($twitt)) {
        $twittername= '../../assets/settings/twitter.txt';
        $twitterf = fopen($twittername, 'r');
        $twitter_link = trim(fread($twitterf, filesize($twittername)));
	fclose($twitterf);

        echo "<h4 class='sett-tit'>Change Twitter Feed?</h4>";
        echo "<a href='../../adv-settings.php' class='inline-link edit-right'>Back to Advanced Settings</a>";
        echo "<p class='warn'>Change the twitter feed that appears on the home page.<br><br> </p>";
        echo "
          <form method='post' action='../../adv-settings.php'>
            <input type='text' size=70 name='new-twit' value='{$twitter_link}'>
            <br><input type='submit' class='form-btn' name='twitter-it' value='Use this feed'>
          </form>
        ";
        
      }

    ?>


    </section>



    <footer class="row group container footer">

      <a class="footnote" href="../../dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="../../help/help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="../../help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
