#!/bin/bash

#$1 should be the port
#Warning. This file has no input validation, so please ensure that it's a correct port
port=$1

firewall_path='/etc/config'

echo working

line_of_port=$(grep -n -e "option name 'port $1'" "$firewall_path/firewall" | cut -f1 -d":" | head -n 1)

if [[ -z "$line_of_port" ]]; then
	echo "Error: This IP was not already on the list"
else
	cp "$firewall_path/empty" "$firewall_path/firewall.tmp"
	cat "$firewall_path/firewall" | head -n $(( $line_of_port - 3 )) >> "$firewall_path/firewall.tmp"
	lines=$(wc -l "$firewall_path/firewall" | cut -f1 -d" ")
	echo $lines
	cat "$firewall_path/firewall" | tail -n $(( $(( $lines - 4 )) - $line_of_port )) >> "$firewall_path/firewall.tmp"
	cp "$firewall_path/firewall.tmp" "$firewall_path/firewall"
	echo "I have removed this port from the firewall list"
fi

#whenever this script is called, make sure to call uci commit firewall and service firewall restart afterwards

#may remove later as pieces fall into place
uci commit firewall
service firewall restart
