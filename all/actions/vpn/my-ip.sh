#!/bin/bash

#cp /etc/backups/empty ./my-ip.txt

touch ./ip-temp.txt
curl ifconfig.me/ip >> ./ip-temp.txt
mv ./ip-temp.txt ./my-ip.txt
if [[ "$1" == "e" ]]; then
	echo $(curl ifconfig.me/ip)
fi
