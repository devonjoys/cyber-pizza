<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Device Scanning</title>
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	</head>
	</head>

	<body>
		<!-- Progress bar holder -->
		<div id="progress" style="width:200px;border:1px solid #fff;"></div>
		<!-- Progress information -->
		<div id="information" style="width"></div>

		<div class="port-results">
		<?php  
		$total = 100; 

		// Loop through process
		for($i=1; $i<=$total; $i++){
		    // Calculate the percentation
		    $percent = intval($i/$total * 100)."%";
		    
		    // Javascript for updating the progress bar and information
		    echo '<script language="javascript">
		    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
		    document.getElementById("information").innerHTML="'.$i.'% scanned.";
		    </script>'; 
		    
		// This is for the buffer achieve the minimum size in order to flush data
		    echo str_repeat(' ',1024*64); 
		    
		// Send output to browser immediately
		    flush(); 
		    
		// Sleep one second so we can see the delay
		    sleep(1);
		} 

		// Tell user that the process is completed
		echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';

	
		$scan_output = shell_exec("bash \www\cyber-pizza\all\actions\scan\device_ports_status.sh portdetail");
		echo "<pre>$output</pre>";
		?>
		</div>
		
	</body>

</html>