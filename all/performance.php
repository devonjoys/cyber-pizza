<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Network Performance</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
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

    <header class="row group container">
        <a href="dash.html">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2>Network Performance</h2>

        
        <nav class="set-btns">
        <ul>
          <li>
            <a href="./help/help-home.php"><h5 class="btn">Help</h5></a>
          </li>
          <li>
            <a href="dash.html"><h5 class="btn">Options</h5></a>
          </li>
        </ul>
        </nav>
    </header>


    

    <section class="int-face">

      <section class="last-week">
        <div class = "feed-title"><h3>Network Performance Summary</h3></div>
        <img class="graph" src="./assets/images/net_speed_plot1.png" width=90% height=auto>
	<img class="graph" src="./assets/images/net_speed_plot2.png" width=90% height=auto>
        <a href="./assets/data/all_speed_tests.txt" download="last1000tests.txt"><br>Download Performance Data</a>
      </section>

      <section class="inputs">

          <h1>Periodic Performance Testing</h1>

          <p class="caption">Set how often device checks network performance. Results are stored for a week and displayed on this page.</p>

          <p> Performance is checked <?php echo $freq; ?> times a day. <a href="perf-change.html">Change Frequency</a></p>


          <form action="./actions/speed-test.php" method="post" target="speedy">
            <input class="submit" type="submit" value="Run Speed Test">
          </form>

          <iframe name="speedy"></iframe>


      </section>


    </section>


    <footer class="row footer">

      <a class="footnote" href="dash.html">Home</a>
      <a class="footnote" href="">FAQ</a>
      <a class="footnote" href="">Contact DukeOIT</a>

    </footer>



    <iframe name="votar" style="display:none;"></iframe>

	</body>

</html>
