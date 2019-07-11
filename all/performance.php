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
    ?>

    <header class="row group container">
        <a href="dash.html">
           <img class="logo" src="./assets/images/dgd.png" width="200px" height=auto>
           <div class="v-line"></div>
        </a> 
        <h2>Network Performance</h2>
        <nav class="user-in">
          <a href="help.html">
            <h5 class="btn">Help</h5>
          </a>
          <a href="dash.html">
            <h5 class="btn">Options</h5>
          </a>
        </nav>
    </header>


    

    <section class="int-face">

      <section class="last-week">
        <div class = "feed-title"><h3>Network Performance<br>Over Past Week</h3></div>
        <img class="graph" src="./assets/images/week-plot.png" width="400px" height=auto>
        <a href="./assets/data/test.txt" download="iperform.txt"><br>Download Performance Data</a>
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