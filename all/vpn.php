<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>VPN Access</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	
<?php
      $fname = "./actions/vpn/vpn_status.txt";

      $fp = fopen($fname, 'r');
      $freq = trim(fread($fp, filesize($fname)));
      fclose($fp);
	echo $freq;
        $out="checked";
	if ($freq == "false") {
		$out="";
	} else {
		$out="checked";
	}
    ?>
	</head>
	<body>
<header class="row group container">
        <a href="dash.html">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2>VPN Access</h2>
	
	<form class="vpn-toggle" action="./actions/vpn/vpn_toggle.php" method="post">
	<label class="switch">
	   <input type="checkbox" name="vpn" value="on" onchange="this.form.submit()" <?php echo $out ?>>
	   <span class="slider round"></span>
	</label>
	</form>
	
        <nav class="set-btns">
        <ul>
          <li>
            <a href="help.html"><h5 class="btn">Help</h5></a>
          </li>
          <li>
            <a href="dash.html"><h5 class="btn">Options</h5></a>
          </li>
        </ul>
        </nav>

    </header>



    <footer class="row footer">

      <a class="footnote" href="dash.html">Home</a>
      <a class="footnote" href="">FAQ</a>
      <a class="footnote" href="">Contact DukeOIT</a>

    </footer>

	</body>

</html>