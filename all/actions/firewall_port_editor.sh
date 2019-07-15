#!/bin/bash

#$1 should be the port, $2 should be allow or block
#Warning. This file has no input validation, so please ensure that it's a correct port
port=$1
a_or_b=$2
firewall_path='/etc/config'

echo working

line_of_port=$(grep -n -e "option name 'port $1'" "$firewall_path/firewall" | cut -f1 -d":" | head -n 1)

if [[ -z "$line_of_port" ]]; then
	echo "this IP was not already on the list"
	if [[ "$2" = "a" ]]; then
		#if empty and allow, open port to outside world ############
		echo -3 "config rule \n\toption name 'port $1'\n\toption dest_port '$1'\n\toption dest 'lan'\n\toption src 'wan'\n\toption target ACCEPT" >> "firewall_path/firewall"	#verify this works
		echo "This port has been opened"
	else
		#if empty and block
		echo -3 "config rule \n\toption name 'port $1'\n\toption dest_port '$1'\n\toption dest 'lan'\n\toption src '*'\n\toption target REJECT" >> "firewall_path/firewall"	#verify this works
		echo "I have blocked this port"
	fi
else
	if [[ "$2" = "a" ]]; then
		echo "This port was already allowed"
	else
		echo "This port was already blocked"
	fi
fi

#whenever this script is called, make sure to call uci commit firewall and service firewall restart afterwards

#may remove this later as pieces fall into place
uci commit firewall
service firewall restart
