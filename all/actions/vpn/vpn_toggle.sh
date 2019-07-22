#!/bin/sh

if [[ $1 -eq 1 ]]; then
	uci set openvpn.custom_config.enabled="1"
	service openvpn start
	echo 'vpn on'>>vpn
fi
if [[ $1 -eq 0 ]]; then
	uci set openvpn.custom_config.enabled="0"
	service openvpn stop
	echo 'vpn off'>>vpn
fi	
uci commit openvpn
#service openvpn restart
service network restart
./my-ip.sh

