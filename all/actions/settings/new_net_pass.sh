#!/bin/bash
login_errors="/www/cyber-pizza/all/assets/settings"
login_line=4
touch $login_errors/login_errors_temp.txt
length=$(expr length "$1")

#This script tests if user has chosen a valid new network password, and changes it accordingly or outputs error messages
#Takes input #1 of network password and #2 of confirmed network password

if [[ -z "$1" ]]; then
	echo "Please input a valid password"
	cat $login_errors/login_errors.txt | head -n 3 >> $login_errors/login_errors_temp.txt
	echo "1" >> $login_errors/login_errors_temp.txt
	cat $login_errors/login_errors.txt | tail -n +5 >> $login_errors/login_errors_temp.txt
	mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
else
	if [[ $length -lt 8 ]]; then
		echo "Your password isn't long enough"
		cat $login_errors/login_errors.txt | head -n 3 >> $login_errors/login_errors_temp.txt
		echo "2" >> $login_errors/login_errors_temp.txt
		cat $login_errors/login_errors.txt | tail -n +5 >> $login_errors/login_errors_temp.txt
		mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
	else
		if [[ $length -gt 32 ]]; then
			echo "Your password is too long"
			cat $login_errors/login_errors.txt | head -n 3 >> $login_errors/login_errors_temp.txt
			echo "3" >> $login_errors/login_errors_temp.txt
			cat $login_errors/login_errors.txt | tail -n +5 >> $login_errors/login_errors_temp.txt
			mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
		else
			if [[ "$1" == "$2" ]]; then
				echo "Your network password has been successfully changed"
				cat $login_errors/login_errors.txt | head -n 3 >> $login_errors/login_errors_temp.txt
				echo "0" >> $login_errors/login_errors_temp.txt
				cat $login_errors/login_errors.txt | tail -n +5 >> $login_errors/login_errors_temp.txt
				mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt

				uci set wireless.@wifi-iface[0].key="$1"
				uci commit wireless
				#wifi
				#/etc/init.d/network restart
				#/etc/init.d/uhttpd restart
			else
				echo "Your passwords do not match"
				cat $login_errors/login_errors.txt | head -n 3 >> $login_errors/login_errors_temp.txt
				echo "4" >> $login_errors/login_errors_temp.txt
				cat $login_errors/login_errors.txt | tail -n +5 >> $login_errors/login_errors_temp.txt
				mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt

			fi
		fi
	fi
fi


