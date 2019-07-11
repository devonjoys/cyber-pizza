<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Network Performance</title>
		<meta http-equiv="refresh" content="0;URL='../fire-change.php'" />
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	</head>
	</head>

	<body>

		<?php  
    
    $aname = '../assets/data/allowed-ips.txt';
    $atemp = '../assets/data/allowed-ips-temp.txt';
    $bname = '../assets/data/blocked-ips.txt';
    $btemp = '../assets/data/blocked-ips-temp.txt';


    function validIPa($input) {
      $atemp = '../assets/data/allowed-ips-temp.txt';
      $ips = file($atemp);
      foreach($ips as $line) {
        if(trim($line) == $input) {
          return 0;
        } 
      }
      if (filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) or filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return 1;
      }
      return 0;
    }

    function validIPb($input) {
      $btemp = '../assets/data/blocked-ips-temp.txt';
      $ips = file($btemp);
      foreach($ips as $line) {
        if(trim($line) == $input) {
          return 0;
        } 
      }
      if (filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) or filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return 1;
      }
      return 0;
    }

    if (validIPa($_POST['wl-ip'])) {

        $add_ip = $_POST['wl-ip'];
        $f = fopen($atemp, 'a+');
        fwrite($f, "\n".$add_ip);
        fclose($f);
    }
    if (validIPb($_POST['bl-ip'])) {
        $add_ip = $_POST['bl-ip'];
        $f = fopen($btemp, 'a+');
        fwrite($f, "\n".$add_ip);
        fclose($f);
    }




    $ip_type = $_POST['gorb'];
    $ip = $_POST['ip'];

    if ($ip_type == 'g') {
        $ips = file($atemp);
      	$out = array();

      	foreach($ips as $line) {
    		    if(trim($line) != $ip) {
         		   $out[] = trim($line); 
         		}
        }

      	$f = fopen($atemp, 'w+');
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
      		$ips = file($btemp);
      		$out = array();

      		foreach($ips as $line) {
    			if(trim($line) != $ip) {
         			$out[] = trim($line); 
         		}
         	}
         	
      		$f = fopen($btemp, 'w+');
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