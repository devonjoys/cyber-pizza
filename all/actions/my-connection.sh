#!/bin/bash

#This script pings Google with a single packet to determine whether or not the network has internet connection and adds it to my-conn.txt

conn=$(ping 8.8.8.8 -c 1 | grep packet | cut -f3 -d "," | cut -f2 -d " " | cut -f1 -d "%")

if [[ "$conn" == "0" ]]; then
	conn_bool=1
	#full packet transmission
else
	conn_bool=0
	#full packet loss
fi

touch /www/cyber-pizza/all/assets/settings/my-conn-temp.txt
echo $conn_bool >> /www/cyber-pizza/all/assets/settings/my-conn-temp.txt
mv /www/cyber-pizza/all/assets/settings/my-conn-temp.txt /www/cyber-pizza/all/assets/settings/my-conn.txt
