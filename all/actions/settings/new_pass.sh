#!/bin/bash

length=$(expr length "$1")

if [[ -z "$1" ]]; then
	if [[ $length -lt 8 ]]; then
		echo "Your password isn't long enough"
	else
		if [[ $length -gt 32 ]]; then
			echo "Your password is too long"
		else
			if [[ "$1" == "$2" ]]; then
				echo "Your admin password has been successfully changed"
				echo -e "$1\n$1" | passwd devil
				service uhttpd restart
			else
				echo "Your passwords do not match"
			fi
		fi
	fi
else
	echo "Please input a valid password"
fi


