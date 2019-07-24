#!/bin/bash

while IFS= read -r line
do
	stat=$line
done < "/www/cyber-pizza/all/assets/settings/frozen.txt"

#1 denotes the network has been frozen, #0 denotes the network is not frozen

if [[ "$stat" == 1 ]]; then
	ifup wan
	/etc/init.d/network restart
	touch /www/cyber-pizza/all/assets/settings/frozen-temp.txt
	echo 0 >> /www/cyber-pizza/all/assets/settings/frozen-temp.txt
	mv /www/cyber-pizza/all/assets/settings/frozen-temp.txt /www/cyber-pizza/all/assets/settings/frozen.txt
elif [[ "$stat" == 0 ]]; then
	ifdown wan
	touch /www/cyber-pizza/all/assets/settings/frozen-temp.txt
	echo 1 >> /www/cyber-pizza/all/assets/settings/frozen-temp.txt
	mv /www/cyber-pizza/all/assets/settings/frozen-temp.txt /www/cyber-pizza/all/assets/settings/frozen.txt
fi


