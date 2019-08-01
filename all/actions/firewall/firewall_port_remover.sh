#!/bin/bash

#this script is called when a user hits the "X" by a blocked port

#$1 should be the port
#Warning. This file has no input validation, so please ensure that it's a correct port
port=$1

#grabs path to firewall configuration file
firewall_path='/etc/config'

echo working

#looks for port within the firewall configuration file
line_of_port=$(grep -n -e "option name 'port $1'" "$firewall_path/firewall" | cut -f1 -d":" | head -n 1)

#if port is not in configuration file, an error has occurred
if [[ -z "$line_of_port" ]]; then
	echo "Error: This IP was not already on the list"
#if port is in configuration file, remove it
else
	cp "/etc/backups/empty" "$firewall_path/firewall.tmp"
	cat "$firewall_path/firewall" | head -n $(( $line_of_port - 3 )) >> "$firewall_path/firewall.tmp"
	lines=$(wc -l "$firewall_path/firewall" | cut -f1 -d" ")
	echo $lines
	cat "$firewall_path/firewall" | tail -n $(( $(( $lines - 4 )) - $line_of_port )) >> "$firewall_path/firewall.tmp"
	cp "$firewall_path/firewall.tmp" "$firewall_path/firewall"
	echo "I have removed this port from the firewall list"
fi

#whenever this script is called, make sure to call uci commit firewall and service firewall restart afterwards
