<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Network Performance</title>
                <link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
                <meta http-equiv="refresh" content="0;URL='/cyber-pizza/all/vpn.php'"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="styles>        </head>
        </head>

        <body>


<?php

if (!empty($_POST['vpn'])) {
	#exec("echo plz on2 >> /www/cyber-pizza/all/actions/vpn/vpn");
	#echo "vpn on";
	exec("cp /etc/backups/empty /www/cyber-pizza/all/actions/vpn/vpn_status.txt");
	exec("echo true >> /www/cyber-pizza/all/actions/vpn/vpn_status.txt");
	exec("uci set openvpn.custom_config.enabled=1");
} else {
	#exec("echo plz off2 >> /www/cyber-pizza/all/actions/vpn/vpn");
	#echo "vpn off";
	exec("cp /etc/backups/empty /www/cyber-pizza/all/actions/vpn/vpn_status.txt");
	exec("echo false >> /www/cyber-pizza/all/actions/vpn/vpn_status.txt");
	exec("uci set openvpn.custom_config.enabled=0");
}	
exec("uci commit openvpn");
exec("service openvpn restart");
exec("service network restart");


?>

</body>
</html>