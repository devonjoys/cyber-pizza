<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Network Performance</title>
		<meta http-equiv="refresh" content="0;URL='../email-chng.php'" />
		<link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	</head>

	<body>

		<?php  
    
    $mname = "../assets/settings/email.txt";
    $mtemp = "../assets/settings/email-temp.txt";

    $new_addr = $_POST['new_addr'];
    if (! empty($new_addr)) {
        $f = fopen($mtemp, 'a+');
        fwrite($f, ",".$new_addr);
        fclose($f);
    } 

    $del = $_POST['addr'];
    if (! empty($del)) {

        $mtemp = "../assets/settings/email-temp.txt";

        $ef = fopen($mtemp, 'r');

        $contents = fread($ef, filesize($mtemp));
        $emails = explode(",", $contents);
        $duke_e = $emails[0];

        $out = array();

      	foreach($emails as $addr) {
    		    if(trim($addr) != $del) {
         		   $out[] = trim($addr); 
         		}
        }

      	$f = fopen($mtemp, 'w+');
      	flock($f, LOCK_EX);
      	$firstline = 1;

 			  foreach($out as $addr) {
 	      		if ($firstline) {
 					      fwrite($f, $duke_e);
 					      $firstline = 0;
 				    } else {
 					      fwrite($f, ','.$addr); 
 				    } 
 			  }

 			  fclose($ef);     	
	  }

		?>

	</body>

</html>
