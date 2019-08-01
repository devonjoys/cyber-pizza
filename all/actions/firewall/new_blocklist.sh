#!/bin/bash

#This script grabs a new blocklist as input to add it to blocklist_ips.txt and block its IPs
#This does not use blocklist_parser.sh to improve runtime.

#grabs location of blocklists file
blocklists='/www/cyber-pizza/all/assets/data/blocklists.txt'

#takes in URL of blocklist as input
list=$1
counter=0

wget $list -O ./tmp_list.txt
echo started processing for $list
    input='./tmp_list.txt'
    #iterates through lines of blocklist
    while IFS= read -r line
    do
	line_short=$(echo "$line" | cut -f1 -d "/")
	valid_ip=$(php-cgi ./validate_ip.php "$line_short" | tail -n 1)
	#if valid IP, add it to blocklist_ips.txt
	if [[ $valid_ip == "1" ]]; then
	    (( counter++ ))
	    echo $line
	    echo $line_short >> /www/cyber-pizza/all/assets/data/blocklist_ips.txt
	    #iterates through blocklist_ips.txt
	    ./firewall_editor.sh $line_short b
	fi
    done < "$input"

echo "$counter Malicious IPs attained from blocklists and added to blocklist_ips.txt"
