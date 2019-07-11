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
      $atemp = './assets/data/allowed-ips-temp.txt';
      $bname = './assets/data/blocked-ips.txt';
      $btemp = './assets/data/blocked-ips-temp.txt';

      $af = fopen($atemp, 'r');
      $bf = fopen($btemp, 'r');

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
                <form method='post' action='./actions/edit-ip.php'> 
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
      <a class="footnote" href="dash.html">Home</a>
      <a class="footnote" href="">FAQ</a>
      <a class="footnote" href="">Contact DukeOIT</a>
    </footer>

    <iframe name="votar" style="display:none;"></iframe>

  </body>

</html>