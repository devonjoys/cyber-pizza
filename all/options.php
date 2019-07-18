<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Help</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400"> -->
	</head>
	<body>

    <header class="row group container">
        <a href="dash.html">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto alt="Duke Guardian Devil Logo">
           <div class="v-line"></div>
        </a> 
        <h2 class="page">Home</h2>

        <nav class="set-btns">
        <ul>
          <li>
            <a href="./help/help-home.php"><h5 class="btn">Help</h5></a>
          </li>
          <li>
            <a href="options.php"><h5 class="btn">Options</h5></a>
          </li>
        </ul>
        </nav>
    </header>

    

    <section class="options-int">

      <h4>Email Preferences</h4>
    
    <?php 
    $email_f = "./assets/settings/emails.txt";
    $ef = fopen($email_f, 'r');

    $emails = array();
      while(! feof($ef)) {
        $addr = fgets($ef);
        $emails[] = $addr;
      }
    $duke_e = $emails[0];

    foreach ($emails as $addr) {
      echo "<h5> {$addr} </h5>";
    }
    ?>




    </section>

    <section class="options-int">

      <h4>Network Performance Preferences</h4>

      <p>
        
      </p>


    </section>


    <footer class="row group container footer">

      <a class="footnote" href="dash.html"> <p class="footie btn">Home</p></a>
      <a class="footnote" href=""><p class="footie btn">FAQ</p></a>
      <a class="footnote" href=""><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>