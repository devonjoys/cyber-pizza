<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Device Scanning</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">

		<style>
			table, td {
			  border-spacing: 5px;
			  padding: 5px;
			  margin-top: 10px;
			  margin-bottom: 5px;
			  text-align: center;
			} 	

			tr{
			  background: #B5B5B5;
			  border-spacing: 5px;
			  padding: 5px;
			  margin-top: 10px;
			  margin-bottom: 5px;
			}

			tr:nth-child(even){
		      background: #e8e8e8;
			  border-spacing: 5px;
			  padding: 5px;
			  margin-top: 10px;
			  margin-bottom: 5px;
			  text-align: center;

			}
			th {
			  border-spacing: 5px;
			  padding: 7px;
			  margin-top: 10px;
			  margin-bottom: 10px;
			  text-align: center;
			}

			#loadingGif{
				width: 100px;
				height: 100px;
			}
		</style>

	</head>
	

	<body>

		<div id="loadingGif" name="loadingGif" style="display:block;"><img src="./assets/images/Loading.gif"></div>
		<table style="width:100%">
		  <tr>
		    <th>Frequency</th>
		    <th>Port</th>
		    <th>State</th> 
		    <th>Protocol</th> 
		    <th>Service</th>
		  </tr>

		  <?php

			$scanOutput = shell_exec("bash /www/cyber-pizza/all/actions/scan/device_ports_status.sh topports");
			$topportAr = explode("\n", $scanOutput );
			for ($i = 0; $i < count($topportAr); $i++) {
				$topportAr[$i] = str_replace(' ','/', $topportAr[$i]);
				$topportAr[$i] = str_replace('//','/', $topportAr[$i]);
				$topportAr[$i] = trim($topportAr[$i]);
				$topportAr[$i] = explode('/', $topportAr[$i]);
				$topportAr[$i] = array_filter($topportAr[$i]);
			}

			$topportAr = array_filter($topportAr);

			?>

			<script>
	          document.getElementById('loadingGif').style.display = "none";
	        </script>

		    <?php

			 for ($i = 0; $i < count($topportAr); $i++) {
			 	echo "<tr>";
		 		foreach($topportAr[$i] as $item) {
		 			?>
		 			<td><?php echo $item; ?></td>
		 			<?php
		 		}
			 	echo "</tr>";
			 }

			 ?>
		</table> 




	</body>

</html>