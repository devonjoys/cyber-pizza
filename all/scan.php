<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Device Scanning</title>
    <link rel="stylesheet" href="assets/stylesheets/main.css">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
  </head>
  <body>

<?php
  $fname = './assets/settings/scan.txt';
  $fp = fopen($fname, 'r');
  $freq = fread($fp, filesize($fname));
  $freq = fread($fp, filesize($fname));
  fclose($fp);
?>

    <header class="row group container">
        <a href="dash.php">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2 class="page">Device Scanning</h2>
        <nav class="set-btns">
        <ul>
          <li>
            <a href="./help/help-home.php"><h5 class="btn">Help</h5></a>
          </li>
          <li>
            <a href="./settings.php"><h5 class="btn">Settings</h5></a>
          </li>
        </ul>
    </nav>
    </header>
    </head>
      <script> 
        function hideButton() {
          var x = document.getElementById("before_scan");
          x.style.display = "none";
        }
      </script>
  
      <section class="scan">
        <div class="rowscan">
        <div class="columnscan">
        <iframe class="devicePopulation" name="devicePopulation" id="devicePopulation" src="./connected-devices.php" height="75" width="350"></iframe> 
        <section class="p-guide">
          <h4 style="border-left:3px solid #B5B5B5;padding-left:10px;margin-top:100px;">Port Scan Guide</h4>
        <ul class=scan>
          <li class=scan><em style="font-weight:bold">Open</em> - An application is actively accepting TCP connections, UDP datagrams or SCTP associations on this port.</li>
          <li class=scan><em style="font-weight:bold">Closed</em> - Port is accessible (it receives and responds to Nmap probe packets), but there is no application listening on it.</li>
          <li class=scan><em style="font-weight:bold">Filtered</em> - Scan cannot determine whether the port is open because packet filtering prevents its probes from reaching the port.</li>
          <li class=scan><em style="font-weight:bold">Unfiltered</em> - This port is accessible, but the scan is unable to determine whether it is open or closed.</li>
        </ul> 
   <h1 class="perf-tit" align="center">Periodic Port Scans</h1>
   <p class="caption">Set how often device runs port scans. If Guardian Devil detects a threat, you will receive an email notification.</p>
     <p class="caption"> <br>Guardian devil runs port scans <span class="a-setting"><?php echo $freq; ?></span> times a week.<a href="scan-change.html" class="form-btn">Change Frequency</a></p>
        </section>
      </div>
      <div class="columnscan">
        <section class="p-scan">
          <h3 style="border-bottom:3px solid #393939;color:#393939;margin:.5em 0;">Scan Information</h3>
         <div id ="before_scan" name="before_scan" style="display:block">
<!--           <form class="portscan_output" action="./portscan.php" method="post" target="myframe">
                <input type="image" src="./assets/images/search.png" name="image" align="middle" width="100" height="100" vspace ="50" hspace="50" alt="submit button" type="submit" value="Run Device Scan" class="button-add" onclick="hideButton();">
            </form> -->
            <form class="portscan_output" action="./portscan.php" method="post" target="myframe">
                <input type="image" src="./assets/images/search.png" alt="button to run scan" type="submit" value="Run Device Scan" class="button-add" onclick="hideButton();">
            </form>
            <p style="text-align: center">
              Click on the magnifying glass to start your scan. -
            <em style="text-align: center">
              This will activate a port scan of all devices currently connected to your network
            </em>
            </p>
          </div>
          <iframe class="myframe" name="myframe" id="myframe"></iframe> 
        </div>
        </section>
      </div>
      </section>
    </section>
    <footer class="row group container footer">
      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>
    </footer>
  </body>
</html>