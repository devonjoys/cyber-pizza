#!/bin/bash

if [[ $1 -eq 1 ]]; then
	uci set openvpn.custom_config.enabled="1"
	#service openvpn start
	#service openvpn enable
	/etc/init.d/openvpn start
	/etc/init.d/openvpn enable
	#echo 'vpn on'>>/www/cyber-pizza/all/actions/vpn/vpn
fi
if [[ $1 -eq 0 ]]; then
	uci set openvpn.custom_config.enabled="0"
	#service openvpn stop
	#service openvpn disable
	/etc/init.d/openvpn stop
	/etc/init.d/openvpn disable
	#echo 'vpn off'>>/www/cyber-pizza/all/actions/vpn/vpn
fi	
uci commit openvpn
#service openvpn restart
#service network restart
#/etc/init.d/network restart
#sleep 5
#/www/cyber-pizza/all/actions/vpn/my-ip.sh
