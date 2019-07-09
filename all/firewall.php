<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Firewall Settings</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	</head>
	<body>

    <header class="row group container">
        <a href="dash.html">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2>Firewall Settings</h2>

        
        <nav class="user-in">
          <a href="help.html">
            <h5 class="btn">Help</h5>
          </a>
          <a href="dash.html">
            <h5 class="btn">Options</h5>
          </a>
        </nav>

    </header>

      <?php  
      $aname = './assets/data/allowed-ips.txt';
      $bname = './assets/data/blocked-ips.txt';

      $af = fopen($aname, 'r');
      $bf = fopen($bname, 'r');

      $allowed = array();
      while(! feof($af)) {
        $ip = fgets($af);
        $allowed[] = $ip;
      }

      $blocked = array();
      while(! feof($bf)) {
        $ip = fgets($bf);
        $blocked[] = $ip;
      }

      fclose($af);
      fclose($bf);
      ?>


        <section class="fire">

          <div class="fire-li">
            <h4>Allowed IPs</h4>
            <ul>
              <?php  
              foreach ($allowed as $ip) {
                echo "<li class='good-ip'>
                {$ip}
                <form method='post' action='./actions/edit-ip.php'> 
                  <input type='hidden' name='ip' value={$ip}>
                  <input type='hidden' name='gorb' value='g'>
                  <input type='submit' name='submit' value='X'>
                </form>
                </li>";
              } ?>
            </ul>

            <div class="bottum">
             <form class="add-ip" action='./actions/edit-ip.php' method="post">
               <input type="txt" name="wl-ip">
               <input type="submit" name="wl-update" value="Add IP to white-list">
             </form>
             </div>

          </div>
          <div class="fire-li">
            <h4>Blocked IPs</h4>
            <ul>
              <?php  
              foreach ($blocked as $ip) {
                echo "<li class='bad-ip'>
                {$ip}
                <form method='post' action='./actions/edit-ip.php'> 
                  <input type='hidden' name='ip' value={$ip}>
                  <input type='hidden' name='gorb' value='b'>
                  <input type='submit' name='submit' value='X' >
                </form>
                </li>";
              } ?>
            </ul>

            <div class="bottum">
            <form class="add-ip" action='./actions/edit-ip.php' method="post">
               <input type="txt" name="bl-ip">
               <input type="submit" name="bl-update" value="Add IP to black-list">
             </form>
             </div>

          </div>
          


        </section>


        <footer class="row footer">

      <a class="footnote" href="dash.html">Home</a>
      <a class="footnote" href="">FAQ</a>
      <a class="footnote" href="">Contact DukeOIT</a>

    </footer>

    <iframe name="votar" style="display:none;"></iframe>

	</body>

</html>