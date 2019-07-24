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
			  width: 50px;
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
			  background: #e8e8e8;
			  border-spacing: 5px;
			  padding: 7px;
			  margin-top: 10px;
			  margin-bottom: 10px;
			  text-align: center;
			  font-weight: bold;
			}

		</style>

	</head>
	

	<body>

		<center><div id="loadingGif" name="loadingGif"><img src="./assets/images/Loading.gif" style="width:100px;height:100px;display:block;top:50%;">
			<figcaption>This may take a few moments ... </figcaption></div></center>

		<table style="width:100%">
			<center>
			<caption>Top Ports</caption>
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
			 	echo "<tr>" ;
		 		foreach($topportAr[$i] as $item) {
		 			
		 			 echo "<td> {$item} </td>" ;
		 		}
			 	echo "</tr>" ;
			 }

			 ?>

		</center>
		</table> 


		<?php

		$scanDOutput = shell_exec("bash /www/cyber-pizza/all/actions/scan/device_ports_status.sh portdetail");
		$portdetailAr = explode("\n", $scanDOutput );
		$portrowNum = 0;
			for ($i = 0; $i < count($portdetailAr); $i++) {
				if (substr( $portdetailAr[$i], 0, 4 ) === "Host"){
					$portdetailAr[$i] = array(substr($portdetailAr[$i], 0, -2), substr($portdetailAr[$i], -1)); 
					
					if ($portrowNum > 0){
						$portrowNum = 0;
						?>

					</center>
					</table>

					<?php


				}

				?>

					<table style="width:100%">
						<center>
						<caption>Device Specs</caption>
						<tr>
					    <th style="border-right:5px solid black">Device IP</th>
					    <th>Ports Open</th>
					  	</tr>

				  	<?php
					echo "<tr>";

					foreach($portdetailAr[$i] as $item) {	
					  echo "<td> {$item} </td>" ;
					}

				}else{
					$portrowNum++;
					$portdetailAr[$i] = trim($portdetailAr[$i]);
					$portdetailAr[$i] = str_replace('/','', $portdetailAr[$i]);
					$portdetailAr[$i] = explode(' ', $portdetailAr[$i]);
					$portdetailAr[$i] = array_filter($portdetailAr[$i]);
					?>

					<tr>
				    <th style="border-right:1px solid black">State</th>
				    <th style="border-right:1px solid black">Protocol</th>
				    <th style="border-right:1px solid black">Port</th>
				    <th>Service</th>
				  	</tr>
				  	<tr>
				  	<?php

					foreach($portdetailAr[$i] as $item) {
					  echo "<td> {$item} </td>" ;
					}

				}
			}
		?>

	</body>

</html>