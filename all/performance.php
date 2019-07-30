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
	<script>
		function hideButton() {
			var x = document.getElementById("before_test");
			x.style.display="none";
			var y = document.getElementById("speedy_gif");
			y.style.display="block";
		}
	</script>
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
        <h1 class='perf-tit'>Performance Summary</h1>
        <img class="graph" src="./assets/images/net_speed_plot1.png" width=90% height=auto>
	<img class="graph" src="./assets/images/net_speed_plot2.png" width=90% height=auto>
        <a href="./assets/data/all_speed_tests.txt" download="last1000tests.txt"><p class="sub-canc to-edit" style="margin-bottom:50px;">Download Performance Data</p></a>
	<br>
      </section>

   <section class="inputs">

          <h1 class="perf-tit" align="center">Network Speed Test</h1>


    <div class="speed-test-div">


         
	<div id="before_test" name="before_test">
		<form class="speed-output" action="./actions/speed-test.php" method="post" target="speedy">
           		<input class="sub-canc" id='speedo' type="submit" value="Run Speed Test" style="align: center;" onclick="hideButton();">
    </form>
		<p class="caption">Click on the button to start your speed test.</p>
	</div>
	<div id="speedy_gif" name="speedy_gif" style="display:none">
		<br><br><br><br><br><br><img src="./assets/images/Loading.gif" alt="Loading icon" style="width:100px; height:100px; height:100px; display:block:top:50%;padding-top:15px;">
	</div>

	<script>
		function frameLoaded() {
			var y = document.getElementById("speedy_gif");
			y.style.display="none";

		}
	</script>

          <iframe name="speedy" class='speed-test-output' id="speedy" onload="frameLoaded(this)"></iframe>

  </div>


    <h1 class="perf-tit" align="center">Periodic Performance Testing</h1>


    <p class="caption">Set how often device checks network performance. Results are stored for a week and displayed on this page.</p>

    <p class="caption"> <br>Performance is checked <span class="a-setting"><?php echo $freq; ?></span> times a day. <a href="perf-change.html" class="form-btn">Change Frequency</a></p>



  <section class="bottom-link">
	  <p class="buttum"><a class='inline-link' href="/cgi-bin/luci/admin/status/realtime">Advanced Graphs and Status</a></p>
	</section>
    </section>
   </section>
   
    <footer class="row group container footer">

      <a class="footnote" href="dash.php"> <p class="footie btn">Home</p></a>
      <a class="footnote" href="help/help-home.php#faq"><p class="footie btn">FAQ</p></a>
      <a class="footnote" href="help/contact.html"><p class="footie btn">Contact DukeOIT</p></a>

    </footer>

	</body>

</html>
