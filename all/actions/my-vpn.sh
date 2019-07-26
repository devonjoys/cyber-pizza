#!/bin/bash

vpn_stat=$(pidof openvpn)
echo $vpn_stat
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/my-vpn.txt

if [[ -z "$vpn_stat" ]]; then
	echo "0" >> /www/cyber-pizza/all/assets/settings/my-vpn.txt
else
	echo "1" >> /www/cyber-pizza/all/assets/settings/my-vpn.txt
fi
