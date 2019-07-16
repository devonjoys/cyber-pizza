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

           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
 
        <h2>Firewall Settings</h2>

        

    </header>

      <?php  
      $aname = './assets/data/allowed-ips.txt';
      $atemp = './assets/data/allowed-ips-temp.txt';
      $bname = './assets/data/blocked-ips.txt';
      $btemp = './assets/data/blocked-ips-temp.txt';
      $urlname = './assets/data/blocklists.txt';
      $urltemp = './assets/data/blocklists-temp.txt';
      $pname = './assets/data/blocked-ports.txt';
      $ptemp = './assets/data/blocked-ports-temp.txt';

      $af = fopen($atemp, 'r');
      $bf = fopen($btemp, 'r');
      $urlf = fopen($urltemp, 'r');
      $pf = fopen($ptemp, 'r');

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

      $urls = array();
      while(! feof($urlf)) {
        $url = fgets($urlf);
        $urls[] = $url;
      }

      $ports = array();
      while(! feof($pf)) {
        $port = fgets($pf);
        $ports[] = $port;
      }

      fclose($af);
      fclose($bf);
      fclose($urlf);
      fclose($pf);
      ?>


        <section class="fire">

          <div class="tcell">
            <h4>Allowed IPs</h4>

            <div class="fire-li">
            <ul>
              <?php  
              foreach ($allowed as $ip) {
                echo "<li class='good-ip'>
                <form method='post' action='./actions/edit-ip.php'> 
                  <input type='hidden' name='ip' value={$ip}>
                  <input type='hidden' name='gorb' value='g'>
                  <input type='submit' name='submit' value='X'>
                </form>
                {$ip}
                </li>";
              } ?>
            </ul>
            </div>
            <form class="add-ip" action='./actions/edit-ip.php' method="post">
               <input type="txt" name="wl-ip">
               <input type="submit" name="wl-update" value="Add IP to white-list">
             </form>
          </div>

          <div class="tcell">
            <h4>Blocked IPs</h4>

            <div class="fire-li">
            <ul>
              <?php  
              foreach ($blocked as $ip) {
                echo "<li class='bad-ip'>
                <form class='X' method='post' action='./actions/edit-ip.php'> 
                  <input type='hidden' name='ip' value={$ip}>
                  <input type='hidden' name='gorb' value='b'>
                  <input type='submit' name='submit' value='X' >
                </form>
                {$ip}
                </li>";
              } ?>
            </ul>
            </div>
            <form class="add-ip" action='./actions/edit-ip.php' method="post">
               <input type="txt" name="bl-ip">
               <input type="submit" name="bl-update" value="Add IP to black-list">
            </form>
          </div>

          <div class="tcell">
            <h4>Blocked Ports</h4>

            <div class="fire-li">
            <ul>
              <?php  
              foreach ($ports as $port) {
                echo "<li class='bad-ip'>
                <form class='X' method='post' action='./actions/edit-ip.php'> 
                  <input type='hidden' name='ip' value={$port}>
                  <input type='hidden' name='gorb' value='port'>
                  <input type='submit' name='submit' value='X' >
                </form>
                {$port}
                </li>";
              } ?>
            </ul>
            </div>
            <form class="add-ip" action='./actions/edit-ip.php' method="post">
               <input type="txt" name="port-add">
               <input type="submit" name="url-update" value="Block Port">
              </form>
          </div>

          </section>
          <section class='fire-url'>

          <div>
            <h4>Bad IP Feed URLs</h4>

            <div class="url-li">
            <ul>
              <?php  
              foreach ($urls as $url) {
                echo "<li class='bad-ip'>
                <form class='X' method='post' action='./actions/edit-ip.php'> 
                  <input type='hidden' name='ip' value={$url}>
                  <input type='hidden' name='gorb' value='url'>
                  <input type='submit' name='submit' value='X' >
                </form>
                {$url}
                </li>";
              } ?>
            </ul>
            </div>
            <form class="add-ip" action='./actions/edit-ip.php' method="post">
               <input type="txt" name="url-add">
               <input type="submit" name="url-update" value="Add URL to black-list feed">
              </form>
          </div>



        </section>
	
	<section>
		<p class="caption">Do not add blocklists with more than 1000 IPs, as it may slow down the device.</p>
		<p class="caption">Your changes may require several minutes to take effect.</p>
	</section>

  
        <form method='post' action='firewall.php'> 
            <input type="hidden" name="save" value="save">
            <input type='submit' name='submit' value='Save Changes'>
        </form>
        <form method='post' action='firewall.php'> 
            <input type="hidden" name="cancel" value="cancel">
            <input type='submit' name='submit' value='Cancel'>
        </form>

    <footer class="row footer">
    </footer>

  </body>

</html>
