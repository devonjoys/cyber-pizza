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

    

    <section class="options-int">

      <h4 class="sett-tit">Email Preferences</h4>
      <p class="sett-text">Add email addresses to recieve emails when Guardian Devil detects the events chosen below.</p>
    
    <?php 
    $email_f = "./assets/settings/email-temp.txt";
    $ef = fopen($email_f, 'r');

    $contents = fread($ef, filesize($email_f));
    $emails = explode(",", $contents);
    $duke_e = $emails[0];
    ?>

    <ul>
    <?php 
        $duu = 1; 
        foreach ($emails as $addr) {
            if ($duu) {
                echo "<li class='good-ip'> {$addr} </li>";
                $duu = 0;
            } else {
                echo "<li class='good-ip'>
                {$addr}
                <form class='remove' method='post' action='./actions/edit-email.php'> 
                  <input type='hidden' name='addr' value={$addr}>
                  <input class='form-btn' type='submit' name='submit' value='Remove email address'>
                </form>
                </li>";
            }
        } 
    ?>
    </ul>

    </div>
        <form class="add-email" action='./actions/edit-email.php' method="post">
            <input  type="email" name="new_addr">
            <input class='form-btn' type="submit" name="email-update" value="Add email to recieve notifications">
        </form>
    </div>

    

    <?php
    $nname = "./assets/settings/notifications.txt";
    $nf = fopen($nname, 'r');

    $notifs = array();
    while(! feof($nf)) {
        $ni = fgets($nf);
        $notifs[] = $ni;
      }

    $boots = "";
    $sus_port = "";
    $new_device = "";
    $drop = "";

      if (trim($notifs[0])) {
        $boots = "checked";
      }
      if (trim($notifs[1])) {
        $sus_port = "checked";
      }
      if (trim($notifs[2])) {
        $new_device = "checked";
      }
      if (trim($notifs[3])) {
        $drop = "checked";
      }


    ?>


    <form method='post' action='settings.php'>

      <p class="sett-text">Choose which events you would like to recieve emails about:</p>

      <ul class='set-form'>
        <li><input type="checkbox" class="noti_choice" name="boot" <?php echo $boots; ?> >System boots</li>

        <li><input type="checkbox" class="noti_choice" name="sus_port" <?php echo $sus_port; ?> >Suspicious port is open</li>

        <li><input type="checkbox" class="noti_choice" name="new_device" <?php echo $new_device; ?> >A new device connects to network</li>

        <li><input type="checkbox" class="noti_choice" name="drop" <?php echo $drop; ?> >Internet speed drops significantly</li>
      </ul>

      <div class="form-end">
        <input class="sub-canc" type='submit' name='save' value='Save Changes'>
        <input class='sub-canc' type='submit' name='cancel' value='Cancel'>
      </div>
    </form>

    </section>



    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
