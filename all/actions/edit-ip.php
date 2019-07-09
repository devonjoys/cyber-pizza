<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Network Performance</title>
		<meta http-equiv="refresh" content="0;URL='../firewall.php'" />
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	</head>
	</head>

	<body>

		<?php  

    $aname = '../assets/data/allowed-ips.txt';
    $bname = '../assets/data/blocked-ips.txt';

    if (! empty($_POST['wl-ip'])) {
        $add_ip = $_POST['wl-ip'];
        $f = fopen($aname, 'a+');
        fwrite($f, "\n".$add_ip);
        fclose($f);
    }
    if (! empty($_POST['bl-ip'])) {
        $add_ip = $_POST['bl-ip'];
        $f = fopen($bname, 'a+');
        fwrite($f, "\n".$add_ip);
        fclose($f);
    }


    $ip_type = $_POST['gorb'];
    $ip = $_POST['ip'];

    if ($ip_type == 'g') {
        $ips = file($aname);
      	$out = array();

      	foreach($ips as $line) {
    		    if(trim($line) != $ip) {
         		   $out[] = trim($line); 
         		}
        }

      	$f = fopen($aname, 'w+');
      	flock($f, LOCK_EX);
      	$firstline = 1;
 			  foreach($out as $line) {
 			      if ($firstline) {
 					      fwrite($f, $line);
 					      $firstline = 0;
 				    } else {
 					      fwrite($f, "\n".$line); 
 				    } 
 			  }

 			  fclose($f);     	
		}

		if ($ip_type == 'b') {
      		$ips = file($bname);
      		$out = array();

      		foreach($ips as $line) {
    			if(trim($line) != $ip) {
         			$out[] = trim($line); 
         		}
         	}
         	
      		$f = fopen($bname, 'w+');
      		flock($f, LOCK_EX);
      		$firstline = 1;
 			foreach($out as $line) {
 				if ($firstline) {
 					fwrite($f, $line);
 					$firstline = 0;
 				} else {
 					fwrite($f, "\n".$line); 
 				} 
 			}

 			fclose($f);     	
		}

		?>

	</body>

</html>