<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Network Performance</title>
                <link rel="stylesheet" href="assets/stylesheets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700" rel="stylesheet">
                <meta http-equiv="refresh" content="0;URL='../../vpn.php'"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="styles>
        </head>

        <body>
	<p>You will be redirected momentarily...</p>

<?php

echo "here">>vpn;

if (!empty($_POST['vpn'])) {
	shell_exec("cp /etc/backups/empty /www/cyber-pizza/all/actions/vpn/vpn_status.txt");
	shell_exec("echo true >> /www/cyber-pizza/all/actions/vpn/vpn_status.txt");
	exec("/www/cyber-pizza/all/actions/vpn/vpn_toggle.sh 1");
	#shell_exec("uci set openvpn.custom_config.enabled=1");
	#shell_exec("service openvpn start");
	#shell_exec("echo 'vpn on'>>vpn");
} else {
	shell_exec("cp /etc/backups/empty /www/cyber-pizza/all/actions/vpn/vpn_status.txt");
	shell_exec("echo false >> /www/cyber-pizza/all/actions/vpn/vpn_status.txt");
	exec("/www/cyber-pizza/all/actions/vpn/vpn_toggle.sh 0");
	#shell_exec("uci set openvpn.custom_config.enabled=0");
	#shell_exec("service openvpn stop");
	#shell_exec("echo 'vpn off'>>vpn");
}	
#shell_exec("uci commit openvpn");
###shell_exec("/etc/init.d/network restart > /dev/null 2>/dev/null &");
###shell_exec('sleep 1');
###shell_exec("/www/cyber-pizza/all/actions/vpn/my-ip.sh > /dev/null 2>/dev/null &");

?>

</body>
</html>
