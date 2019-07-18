#!/bin/bash

length=$(expr length "$1")

if [[ -z "$1" ]]; then
	if [[ $length -lt 3 ]]; then
		echo "Your ssid isn't long enough"
	else
		if [[ $length -gt 32 ]]; then
			echo "Your ssid is too long"
		else
			echo "Your ssid has been successfully changed"
			uci set wireless.@wifi-iface[0].ssid="$1"
			uci commit wireless
			wifi
			service network restart
			fi
	fi
else
	echo "Please input a valid ssid"
fi


