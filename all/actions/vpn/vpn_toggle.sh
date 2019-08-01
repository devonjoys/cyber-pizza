#!/bin/bash

#This script is a helper to vpn_toggle.php that turns on or off VPN. May be removed in future iterations

if [[ $1 -eq 1 ]]; then
	uci set openvpn.custom_config.enabled="1"
fi
if [[ $1 -eq 0 ]]; then
	uci set openvpn.custom_config.enabled="0"
fi	
uci commit openvpn
#service openvpn restart
#service network restart
#/etc/init.d/network restart
#sleep 5
#/www/cyber-pizza/all/actions/vpn/my-ip.sh
