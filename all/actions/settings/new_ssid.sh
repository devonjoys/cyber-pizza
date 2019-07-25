#!/bin/bash
login_errors="/www/cyber-pizza/all/assets/settings"
login_line=3
touch $login_errors/login_errors_temp.txt
length=$(expr length "$1")

if [[ -z "$1" ]]; then
	echo "Please input a valid ssid"
	echo "Please input a valid SSID."
	cat $login_errors/login_errors.txt | head -n 2 >> $login_errors/login_errors_temp.txt
	echo "1" >> $login_errors/login_errors_temp.txt
	cat $login_errors/login_errors.txt | tail -n +4 >> $login_errors/login_errors_temp.txt
	mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
else
	if [[ $length -lt 3 ]]; then
		echo "Your ssid isn't long enough"
		cat $login_errors/login_errors.txt | head -n 2 >> $login_errors/login_errors_temp.txt
		echo "2" >> $login_errors/login_errors_temp.txt
		cat $login_errors/login_errors.txt | tail -n +4 >> $login_errors/login_errors_temp.txt
		mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
	else
		if [[ $length -gt 32 ]]; then
			echo "Your ssid is too long"
			cat $login_errors/login_errors.txt | head -n 2 >> $login_errors/login_errors_temp.txt
			echo "3" >> $login_errors/login_errors_temp.txt
			cat $login_errors/login_errors.txt | tail -n +4 >> $login_errors/login_errors_temp.txt
			mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
		else
			echo "Your ssid has been successfully changed"
			echo "Please input a valid SSID."
			cat $login_errors/login_errors.txt | head -n 2 >> $login_errors/login_errors_temp.txt
			echo "0" >> $login_errors/login_errors_temp.txt
			cat $login_errors/login_errors.txt | tail -n +4 >> $login_errors/login_errors_temp.txt
			mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
			uci set wireless.@wifi-iface[0].ssid="$1"
			uci commit wireless
			#wifi
			#/etc/init.d/network restart
			#/etc/init.d/uhttpd restart
			fi
	fi

fi


