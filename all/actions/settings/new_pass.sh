#!/bin/bash

old_pass=$(cat /etc/shadow | head -n 2 | tail -n 1 | cut -f2 -d ":")
salt=$(cat /etc/shadow | head -n 2 | tail -n 1 | cut -f3 -d "$")
echo "ok"
conf_old=$(echo $1 | openssl passwd -1 -salt $salt -stdin)
echo "ok"
length=$(expr length "$2")

if [[ "$conf_old" == "$old_pass" ]]; then
	if [[ -z "$2" ]]; then
		echo "Please input a valid password."
	else
		if [[ $length -lt 8 ]]; then
			echo "Your password isn't long enough."
		else
			if [[ $length -gt 32 ]]; then
				echo "Your password is too long."
			else
				if [[ "$2" == "$3" ]]; then
					echo "Your admin password has been successfully changed."
					echo -e "$2\n$2" | passwd devil
					/etc/init.d/uhttpd restart
				else
					echo "Your new passwords do not match."
				fi
			fi
		fi

	fi
else
	echo "Your old password does not match."
fi

