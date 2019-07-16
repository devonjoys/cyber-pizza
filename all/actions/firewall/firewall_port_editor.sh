#!/bin/bash

#$1 should be the port, $2 should be allow or block, $3 should be 0 to silence output
#Warning. This file has no input validation, so please ensure that it's a correct port
port=$1
a_or_b=$2
if [[ "$3" == 0 ]]; then
	verb=0
else
	verb=1
fi

firewall_path='/etc/config'

if [[ "$verb" == "1" ]]; then echo working; fi

line_of_port=$(grep -n -e "option name 'port $1'" "$firewall_path/firewall" | cut -f1 -d":" | head -n 1)

if [[ -z "$line_of_port" ]]; then
	if [[ "$verb" == "1" ]]; then echo "this IP was not already on the list"; fi
	if [[ "$2" = "a" ]]; then
		##if empty and allow, open port to outside world ############
		#echo -e "config rule \n\toption name 'port $1'\n\toption dest_port '$1'\n\toption dest 'lan'\n\toption src 'lan'\n\toption target ACCEPT" >> "$firewall_path/firewall"	#verify this works
		#echo "This port has been opened"
		echo "This feature is currently not implemented for security reasons. Please add any custom port accept rules to the file in /etc/config"
	else
		#if empty and block, don't let traffic go outbound
		echo -e "config rule \n\toption name 'port $1'\n\toption dest_port '$1'\n\toption dest 'wan'\n\toption src '*'\n\toption target REJECT" >> "$firewall_path/firewall"	#verify this works
		if [[ "$verb" == "1" ]]; then echo "I have blocked this port"; fi
	fi
else
	if [[ "$2" = "a" ]]; then
		if [[ "$verb" == "1" ]]; then echo "This port was already allowed"; fi
	else
		if [[ "$verb" == "1" ]]; then echo "This port was already blocked"; fi
	fi
fi
#whenever this script is called, make sure to call uci commit firewall and service firewall restart afterwards
#may remove this later as pieces fall into place
#uci commit firewall
#service firewall restart
