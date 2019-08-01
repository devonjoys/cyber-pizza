#!/bin/bash

#This script tests whether the user has input a valid netID and outputs errors or changes it accordingly
#This script takes in $1 as netID

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
			cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/email.txt
			echo "$1@duke.edu" >> /www/cyber-pizza/all/assets/settings/email.txt
			cp /www/cyber-pizza/all/assets/settings/email.txt /www/cyber-pizza/all/assets/settings/email-temp.txt
			
			touch /www/cyber-pizza/all/assets/settings/net-id-temp.txt
			echo "$1" >> /www/cyber-pizza/all/assets/settings/net-id-temp.txt
			mv /www/cyber-pizza/all/assets/settings/net-id-temp.txt /www/cyber-pizza/all/assets/settings/net-id.txt
			fi
	fi

fi


