#!/bin/bash
login_errors="/www/cyber-pizza/all/assets/settings"
login_line=3
touch $login_errors/login_errors_temp.txt
length=$(expr length "$1")

if [[ -z "$1" ]]; then
	echo "Please input a valid netID"
	echo "1" >> $login_errors/login_errors_temp.txt
	cat $login_errors/login_errors.txt | tail -n +2 >> $login_errors/login_errors_temp.txt
	mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
else
	if [[ $length -lt 2 ]]; then
		echo "Your netID isn't long enough"
		echo "2" >> $login_errors/login_errors_temp.txt
		cat $login_errors/login_errors.txt | tail -n +2 >> $login_errors/login_errors_temp.txt
		mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
	else
		if [[ $length -gt 15 ]]; then
			echo "Your netID is too long"
			echo "3" >> $login_errors/login_errors_temp.txt
			cat $login_errors/login_errors.txt | tail -n +2 >> $login_errors/login_errors_temp.txt
			mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
		else
			echo "Your netID has been successfully changed"
			echo "0" >> $login_errors/login_errors_temp.txt
			cat $login_errors/login_errors.txt | tail -n +2 >> $login_errors/login_errors_temp.txt
			mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt

			touch /www/cyber-pizza/all/assets/settings/net-id-temp.txt
			echo "$1" >> /www/cyber-pizza/all/assets/settings/net-id-temp.txt
			mv /www/cyber-pizza/all/assets/settings/net-id-temp.txt /www/cyber-pizza/all/assets/settings/net-id.txt
			fi
	fi

fi


