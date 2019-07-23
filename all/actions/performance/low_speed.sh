#!/bin/bash

down=$(cat /www/cyber-pizza/all/assets/data/last_speed_test.txt | cut -f23 -d " ")
down_int=$(echo $down | cut -f1 -d ".")
echo $down_int

#controls when the user will be notified
threshold=10

if [[ $down_int -lt $threshold ]]; then
	/etc/init.d/emailnotification.sh start 4
	echo low
else
	echo functioning as normal
fi
