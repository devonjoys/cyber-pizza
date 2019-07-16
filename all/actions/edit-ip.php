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

	<body>

		<?php  
    
    $aname = '../assets/data/allowed-ips.txt';
    $atemp = '../assets/data/allowed-ips-temp.txt';
    $bname = '../assets/data/blocked-ips.txt';
    $btemp = '../assets/data/blocked-ips-temp.txt';
    $urlname = '../assets/data/blocklists.txt';
    $urltemp = '../assets/data/blocklists-temp.txt';
    $pname = '../assets/data/blocked-ports.txt';
    $ptemp = '../assets/data/blocked-ports-temp.txt';


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


    function validURL($input) {
      $urltemp = '../assets/data/blocklists-temp.txt';
      $urls = file($urltemp);
      foreach($urls as $line) {
        if(trim($line) == $input) {
          return 0;
        } 
      }
      $protocal = 'http://'.$input;
      if (filter_var($input, FILTER_VALIDATE_URL) || filter_var($protocal, FILTER_VALIDATE_URL)) {
        echo 'valid url';
        return 1;
      }
      return 0;
    }

    function validPORT($input) {
      $ptemp = '../assets/data/blocked-ports-temp.txt';
      $ports = file($ptemp);
      foreach($ports as $port) {
        if(trim($line) == $port) {
          return 0;
        } 
      }
      echo "checking";
      $bad_ports = array(22, 53, 67, 68, 80, 123, 443);
      foreach ($bad_ports as $prt) {
        if ($input == $prt) {
          return 0;
        }
      }

      if ($input >= 0 and $input <= 65535) {
        echo "valid port";
        return 1;
      }
      return 0;
    }


    if (validIPa($_POST['wl-ip'])) {

        $add_ip = $_POST['wl-ip'];
	exec("/www/cyber-pizza/all/actions/firewall/firewall_editor.sh $add_ip a");
        $f = fopen($atemp, 'a+');
        fwrite($f, "\n"."$add_ip");
        fclose($f);
    }
    if (validIPb($_POST['bl-ip'])) {
        exec("/www/cyber-pizza/all/actions/firewall/firewall_editor.sh $add_ip b");
	$add_ip = $_POST['bl-ip'];
        $f = fopen($btemp, 'a+');
        fwrite($f, "\n"."$add_ip");
        fclose($f);
    }
    if (validURL($_POST['url-add'])) {
	exec("/www/cyber-pizza/all/actions/firewall/new_blocklist.sh $add_url"); //MAY NEED TO FIX THIS EVENTUALLY FOR RUNTIME'S SAKE--KINDA BOTHERSOME
        $add_url = $_POST['url-add'];
        $f = fopen($urltemp, 'a+');
        fwrite($f, "\n"."$add_url");
        fclose($f);
    }
    if (validPORT($_POST['port-add'])) {
        exec("/www/cyber-pizza/all/actions/firewall/firewall_port_editor.sh $add_port b");
	$add_port = $_POST['port-add'];
        $f = fopen($ptemp, 'a+');
        fwrite($f, "\n"."$add_port");
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
         		} else {
				exec("/www/cyber-pizza/all/actions/firewall/block_allow_helper.sh");
				echo("block allow helper just ran");
				// MAY NEED TO FIX THIS EVENTUALLY FOR RUNTIME'S SAKE--KINDA BOTHERSOME
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
         		} else {
				exec("/www/cyber-pizza/all/actions/firewall/firewall_editor.sh $ip allow");
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

    $del = $_POST['ip'];
    if ($ip_type == 'url') {
          $urls = file($urltemp);
          $out = array();

          foreach($urls as $line) {
          if(trim($line) != $del) {
              $out[] = trim($line); 
            } else {
		exec("/www/cyber-pizza/all/actions/firewall/block_allow_helper.sh");
	    }
          }
          
          $f = fopen($urltemp, 'w+');
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

    if ($ip_type == 'port') {
          $ports = file($ptemp);
          $out = array();

          foreach($ports as $line) {
          if(trim($line) != $del) {
              $out[] = trim($line); 
            } else {
		exec("/www/cyber-pizza/all/actions/firewall/firewall_port_remover $del");
	    }
          }
          
          $f = fopen($ptemp, 'w+');
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
