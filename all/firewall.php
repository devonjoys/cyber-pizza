<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Firewall Settings</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	</head>
	<body>

    <header class="row group container">
        <a href="dash.html">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2 class="page">Firewall Settings</h2>

        
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
        exec('rm ./assets/data/allowed-ips.txt');
        exec('cp ./assets/data/allowed-ips-temp.txt ./assets/data/allowed-ips.txt');
        exec('rm ./assets/data/blocked-ips.txt');
        exec('cp ./assets/data/blocked-ips-temp.txt ./assets/data/blocked-ips.txt');
        exec('rm ./assets/data/blocklists.txt');
        exec('cp ./assets/data/blocklists-temp.txt ./assets/data/blocklists.txt');
        exec('rm ./assets/data/blocked-ports.txt');
        exec('cp ./assets/data/blocked-ports-temp.txt ./assets/data/blocked-ports.txt');
	exec('/www/cyber-pizza/all/actions/firewall/block_allow_helper.sh');
	exec('www/cyber-pizza/all/actions/firewall/block_allow_port_helper.sh');
	exec('/www/cyber-pizza/all/actions/firewall/firewall_restore.sh');
	exec('echo I did it');
	exec('uci commit firewall');
	exec('service firewall restart');
      }
      if (! empty($_POST['cancel'])){
        exec('rm ./assets/data/allowed-ips-temp.txt');
        exec('cp ./assets/data/allowed-ips.txt ./assets/data/allowed-ips-temp.txt');
        exec('rm ./assets/data/blocked-ips-temp.txt');
        exec('cp ./assets/data/blocked-ips.txt ./assets/data/blocked-ips-temp.txt');
        exec('rm ./assets/data/blocklists-temp.txt');
        exec('cp ./assets/data/blocklists.txt ./assets/data/blocklists-temp.txt');
        exec('rm ./assets/data/blocked-ports-temp.txt');
        exec('cp ./assets/data/blocked-ports.txt ./assets/data/blocked-ports-temp.txt');
	exec('/www/cyber-pizza/all/actions/firewall/block_allow_helper.sh');
	exec('/www/cyber-pizza/all/actions/firewall/block_allow_port_helper.sh');
	#exec('uci commit firewall');
	#exec('service firewall restart);
      }

      $aname = './assets/data/allowed-ips.txt';
      $bname = './assets/data/blocked-ips.txt';
      $urlname = './assets/data/blocklists.txt';
      $pname = './assets/data/blocked-ports.txt';

      $af = fopen($aname, 'r');
      $bf = fopen($bname, 'r');
      $urlf = fopen($urlname, 'r');
      $pf = fopen($pname, 'r');

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


      <div class="main">
      <div class="full">

        <h1>Status of Firewall</h1>

        <section class="fire">

          <div class="tcell">
            <h4>Allowed IPs</h4>

            <div class="fire-li">
            <ul>
              <?php  
              foreach ($allowed as $ip) {
                echo "<li class='good-ip'>
                {$ip}
                </li>";
              } ?>
            </ul>
            </div>
          </div>

          <div class="tcell">
            <h4>Blocked IPs</h4>
            <div class="fire-li">
            <ul>
              <?php  
              foreach ($blocked as $ip) {
                echo "<li class='bad-ip'>
                {$ip}
                </li>";
              } ?>
            </ul>
            </div>
          </div>

          <div class="tcell">
            <h4>Blocked Ports</h4>
            <div class="fire-li">
            <ul>
              <?php  
              foreach ($ports as $port) {
                echo "<li class='bad-ip'>
                {$port}
                </li>";
              } ?>
            </ul>
            </div>
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
                {$url}
                </li>";
              } ?>
            </ul>
            </div>
          </div>

          <a href="fire-change.php"><h4 class="to-edit">EDIT FIREWALL</h4></a>

        </section>


        <a href="https://10.42.0.1/cgi-bin/luci/admin/status/iptables"><h4 class='inline-link'>Advanced Firewall Settings</h4></a>

      </div>
      </div>

      <footer class="row group container footer">

      <a class="footnote" href="dash.html"> <p class="footie btn">Home</p></a>
      <a class="footnote" href=""><p class="footie btn">FAQ</p></a>
      <a class="footnote" href=""><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

    <iframe name="votar" style="display:none;"></iframe>

	</body>

</html>
