#!/bin/bash

#$1 should be the ip, $2 should be allow or block, $3 should be 0 to silence output
#Warning: this script has no input validation, so please ensure it is a correct IP
ip=$1
a_or_b=$2
if [[ "$3" = "0" ]]; then
	verb=0
else
	verb=1
fi

#grabs location of firewall configuration files
firewall_path='/etc/config'

if [[ "$verb" == "1" ]]; then echo working; fi

#tests if the IP is already within the firewall configuration
line_of_ip=$(grep -n -e "option name '$1'" "$firewall_path/firewall" | cut -f1 -d":" | head -n 1)

#if IP is not already within configuration, add it accordingly
if [[ -z "$line_of_ip" ]]; then
	if [[ "$verb" == "1" ]]; then echo "this IP was not already on the list"; fi
	if [[ "$2" == "a" ]]; then
		#if empty and allow, do nothing
		if [[ "$verb" = "1" ]]; then echo "This IP is already allowed"; fi
	else
		#if empty and block
		echo -e "config rule \n\toption name '$1'\n\toption src_ip '$1'\n\toption target REJECT\n\toption src 'wan'\n\toption dest 'lan'\n" >> "$firewall_path/firewall"
		if [[ "$verb" == "1" ]]; then echo "I have blocked this IP"; fi
	fi
#if IP is already within configuration, modify it accordingly
else
	if [[ "$2" == "a" ]]; then
		
		cp "/etc/backups/empty" "$firewall_path/firewall.tmp"
		cat "$firewall_path/firewall" | head -n $(( $line_of_ip - 3 )) >> "$firewall_path/firewall.tmp"
		lines=$(wc -l "$firewall_path/firewall" | cut -f1 -d" ")
		#echo $lines
		cat "$firewall_path/firewall" | tail -n $(( $(( $lines - 4 )) - $line_of_ip )) >> "$firewall_path/firewall.tmp"
		cp "$firewall_path/firewall.tmp" "$firewall_path/firewall"
		if [[ "$verb" == "1" ]]; then echo "I have allowed this IP"; fi
	else
		if [[ "$verb" == "1" ]]; then echo "This IP is already blocked"; fi
	fi
fi

#whenever this script is called, make sure to call uci commit firewall and service firewall restart afterwards
