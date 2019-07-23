#!/bin/bash

vpn_stat=$(pidof openvpn)
echo $vpn_stat

if [[ -z "$vpn_stat ]]; then
	echo "0" >> /www/cyber-pizza/all/assets/settings/my-vpn.txt
else
	echo "1" >> /www/cyber-pizza/all/assets/settings/my-vpn.txt
fi
