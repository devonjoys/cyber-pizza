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
		</style>

	</head>
	

	<body>

		<div id="progress" style="width:500px;position:center;border:5px solid #FFF;"></div>
		<!-- Progress information -->
		<div id="information" style="width"></div>

		<div class="port-results">
		<?php  
		
		$total = 20; 

		// Loop through process
		for($i=1; $i<=$total; $i++){
		    // Calculate the percentation

		    $percent = intval($i/$total * 100)."%";
		    
		    // Javascript for updating the progress bar and information
		    echo '<script language="javascript">
		    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#012169;\">&nbsp;</div>";
		    document.getElementById("information").innerHTML=" Currently scanning... Please be patient";
		    </script>'; 
		    
		// This is for the buffer achieve the minimum size in order to flush data
		    echo str_repeat(' ',1024*64); 	    
		// Send output to browser immediatedly
		    flush(); 	    
		// Sleep one second so we can see the delay
		    sleep(1);
		} 
		// Tell user that the process is completed
		echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';

		?>
		</div>

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