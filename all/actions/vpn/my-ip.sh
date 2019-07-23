#!/bin/bash

#cp /etc/backups/empty ./my-ip.txt

touch /www/cyber-pizza/all/actions/vpn/ip-temp.txt
curl ifconfig.me/ip >> /www/cyber-pizza/all/actions/vpn/ip-temp.txt
mv /www/cyber-pizza/all/actions/vpn/ip-temp.txt /www/cyber-pizza/all/actions/vpn/my-ip.txt
if [[ "$1" == "e" ]]; then
	echo $(curl ifconfig.me/ip)
fi
