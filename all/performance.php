<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Network Performance</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	</head>
	<body>

    <?php  
      $fname = './assets/settings/performance.txt';

      $fp = fopen($fname, 'r');
      $freq = fread($fp, filesize($fname));
      fclose($fp);
      shell_exec("cp /mnt/mmcblk0p3/ubuntu/etc/speedtestprocessor/net_speed_plot1.png /www/cyber-pizza/all/assets/images/net_speed_plot1.png");
      shell_exec("cp /mnt/mmcblk0p3/ubuntu/etc/speedtestprocessor/net_speed_plot2.png /www/cyber-pizza/all/assets/images/net_speed_plot2.png");
      shell_exec("cp /mnt/mmcblk0p3/ubuntu/etc/speedtestprocessor/all_speed_tests.txt /www/cyber-pizza/all/assets/data/all_speed_tests.txt");
      shell_exec("cp /mnt/mmcblk0p3/ubuntu/etc/speedtestprocessor/last_speed_test.txt /www/cyber-pizza/all/assets/data/last_speed_test.txt");

    ?>
    <script>
	var test_initiated=false;
    </script>

    <header class="row group container">
        <a href="dash.php">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2 class="page">Network Performance</h2>

        
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


    

    <section class="perf-int">

      <section class="last-week">
        <div class = "lw-tit"><h3>Network Performance Summary</h3></div>
        <img class="graph" src="./assets/images/net_speed_plot1.png" width=90% height=auto>
	<img class="graph" src="./assets/images/net_speed_plot2.png" width=90% height=auto>
        <a href="./assets/data/all_speed_tests.txt" download="last1000tests.txt"><br>Download Performance Data</a>
      </section>

      <section class="inputs">

          <h1 class="perf-tit">Periodic Performance Testing</h1>

          <p class="caption">Set how often device checks network performance. Results are stored for a week and displayed on this page.</p>

          <p class="caption"> Performance is checked <?php echo $freq; ?> times a day. <a href="perf-change.html">Change Frequency</a></p>


         <pre><form class="speed-output" action="./actions/speed-test.php" method="post" target="speedy">
           	<input class="submit" type="submit" value="Run Speed Test" onclick="initiation();">-->
          </form></pre>
	  <p class="notice" id="notice"></p>
		<script>
		function initiation() {
		document.getElementById("notice").innerHTML = "This may take a moment...";
		}
		</script>
          <iframe name="speedy"></iframe>


      	<section class="bottom-link">
	  <p class="caption"><a href="https://10.42.0.1/cgi-bin/luci/admin/status/realtime">Advanced Graphs and Status</a></p>
	</section>
    </section>
   </section>
   
    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>



    <iframe name="votar" style="display:none;"></iframe>

	</body>

</html>
