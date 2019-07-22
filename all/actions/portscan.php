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
		.loader {
		  border: 16px solid #f3f3f3; /* Light grey */
		  border-top: 16px solid #3498db; /* Blue */
		  border-radius: 50%;
		  width: 120px;
		  height: 120px;
		  animation: spin 2s linear infinite;
		}

		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		} 
	</style>

	</head>

	<body>
		<?php  
		
		// $total = 50; 

		// // Loop through process
		// for($i=1; $i<=$total; $i++){
		//     // Calculate the percentation

		//     $percent = intval($i/$total * 100)."%";
		    
		    // Javascript for updating the progress bar and information
		    echo '<script language="javascript">
		    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#012169;\">&nbsp;</div>";
		    document.getElementById("information").innerHTML=" Currently scanning... Please be patient";
		    </script>';
		    
		// // This is for the buffer achieve the minimum size in order to flush data
		//     echo str_repeat(' ',1024*64); 	    
		// // Send output to browser immediatedly
		//     flush(); 	    
		// // Sleep one second so we can see the delay
		//     sleep(1);
		// } 

		<div class="loader"></div>
		// Tell user that the process is completed
		echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';

		$scan_output = shell_exec("bash /www/cyber-pizza/all/actions/scan/device_ports_status.sh topports");
			echo "{$scan_output}";

		?>
		</div>
		
	</body>

</html>