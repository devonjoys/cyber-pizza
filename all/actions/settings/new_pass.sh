#!/bin/bash

#This script tests if the user's new admin password is valid, and outputs errors or changes it accordingly
#This script takes $1 as old password, $2 as new password, and #3 as password confirmation

login_errors="/www/cyber-pizza/all/assets/settings"
login_line=2
touch $login_errors/login_errors_temp.txt

old_pass=$(cat /etc/shadow | head -n 2 | tail -n 1 | cut -f2 -d ":")
salt=$(cat /etc/shadow | head -n 2 | tail -n 1 | cut -f3 -d "$")
#echo "ok"
conf_old=$(echo $1 | openssl passwd -1 -salt $salt -stdin)
#echo "ok"
length=$(expr length "$2")

if [[ "$conf_old" == "$old_pass" ]]; then
	if [[ -z "$2" ]]; then
		echo "Please input a valid password."
		cat $login_errors/login_errors.txt | head -n 1 >> $login_errors/login_errors_temp.txt
		echo "1" >> $login_errors/login_errors_temp.txt
		cat $login_errors/login_errors.txt | tail -n +3 >> $login_errors/login_errors_temp.txt
		mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
	else
		if [[ $length -lt 8 ]]; then
			echo "Your password isn't long enough."
			cat $login_errors/login_errors.txt | head -n 1 >> $login_errors/login_errors_temp.txt
			echo "2" >> $login_errors/login_errors_temp.txt
			cat $login_errors/login_errors.txt | tail -n +3 >> $login_errors/login_errors_temp.txt
			mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
		else
			if [[ $length -gt 32 ]]; then
				echo "Your password is too long."
				cat $login_errors/login_errors.txt | head -n 1 >> $login_errors/login_errors_temp.txt
				echo "3" >> $login_errors/login_errors_temp.txt
				cat $login_errors/login_errors.txt | tail -n +3 >> $login_errors/login_errors_temp.txt
				mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt

			else
				if [[ "$2" == "$3" ]]; then
					echo "Your admin password has been successfully changed."
					echo -e "$2\n$2" | passwd devil
					cat $login_errors/login_errors.txt | head -n 1 >> $login_errors/login_errors_temp.txt
					echo "0" >> $login_errors/login_errors_temp.txt
					cat $login_errors/login_errors.txt | tail -n +3 >> $login_errors/login_errors_temp.txt
					mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
					block_pass=$(echo "$2" | tr "!-~" "*")
					touch /www/cyber-pizza/all/assets/settings/block_pass_temp.txt
					echo "$block_pass" >> /www/cyber-pizza/all/assets/settings/block_pass_temp.txt
					mv /www/cyber-pizza/all/assets/settings/block_pass_temp.txt /www/cyber-pizza/all/assets/settings/block_pass.txt
					#/etc/init.d/uhttpd restart
				else
					echo "Your new passwords do not match."
					cat $login_errors/login_errors.txt | head -n 1 >> $login_errors/login_errors_temp.txt
					echo "4" >> $login_errors/login_errors_temp.txt
					cat $login_errors/login_errors.txt | tail -n +3 >> $login_errors/login_errors_temp.txt
					mv $login_errors/login_errors_temp.txt $login_errors/login_errors.txt
				fi
			fi
		fi

	fi
else
	echo "Your old password does not match."
fi

