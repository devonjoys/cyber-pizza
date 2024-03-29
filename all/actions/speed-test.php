<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Network Performance</title>
		<link rel="stylesheet" href="../assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	</head>
	</head>

	<body>

	<!--	<div id="loadingGif" name="loadingGif" style="display:block;"><img src="./all/assets/images/Loading.gif" style="width:100px;height:100px;display:block;top:50%;">
			<figcaption>This may take a few moments ... </figcaption></div>-->

		
		<div>
		<?php  
		//function for formatting speed test output using tabs
		function tab2nbsp($str)
		{
			return(str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp', $str));
		}
		//runs a speed test once
		shell_exec("/www/cyber-pizza/all/actions/performance/json_chrooter.sh 1 s");
		shell_exec("cp /mnt/mmcblk0p3/ubuntu/etc/speedtestprocessor/last_speed_test.txt /www/cyber-pizza/all/assets/data/last_speed_test.txt");
		$return1=shell_exec("./performance/last_test_parser.py");
		$return2=str_replace("ttt", "\t", str_replace("qqq", "\n", $return1));
		$output=tab2nbsp(nl2br($return2));

		?>		

		<?php
		echo "<html>";
		//handles the output based on delimitters
		$inter=explode("@", $output);
		
		$out_names=explode("&", $inter[0]);
		$out_vals=explode("&", $inter[1]);
		//format speed test output in a table
		echo "<div class='speed-test-output'><table style='width:100%'> <tr><td>$out_names[0]</td><td>$out_vals[0]</td></tr>
						<tr><td>$out_names[1]</td><td>$out_vals[1]</td></tr>
						<tr><td>$out_names[2]</td><td>$out_vals[2]</td></tr>
						<tr><td>$out_names[3]</td><td>$out_vals[3]</td></tr>
						<tr><td>$out_names[4]</td><td>$out_vals[4]</td></tr>
						<tr><td>$out_names[5]</td><td>$out_vals[5]</td></tr></table></html></div>";		

		?>
		</div>
	</body>

</html>
