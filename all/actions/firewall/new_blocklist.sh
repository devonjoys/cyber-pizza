#!/bin/bash

#This script grabs a new blocklist as input to add it to blocklist_ips.txt and block its IPs

blocklists='/www/cyber-pizza/all/assets/data/blocklists.txt'

list=$1
counter=0

wget $list -O ./tmp_list.txt
echo started processing for $list
##########################################################Implementation using curl
   # for ip in ${this_list};
    #do
#	valid_ip=$(php-cgi ./validate_ip.php "${ip[0]}" | tail -n 1)
#	if [[ $valid_ip == "1" ]]; then
#	    echo $ip >> /www/cyber-pizza/all/assets/data/blocklist_ips.txt
#	    #echo $ip
#	    ./firewall_editor.sh $ip b
#	fi
 #   done
##########################################################Implementation using wget
    input='./tmp_list.txt'
    while IFS= read -r line
    do
	line_short=$(echo "$line" | cut -f1 -d "/")
	valid_ip=$(php-cgi ./validate_ip.php "$line_short" | tail -n 1)
	    #echo $line
	if [[ $valid_ip == "1" ]]; then
	    (( counter++ ))
	    echo $line
	    echo $line_short >> /www/cyber-pizza/all/assets/data/blocklist_ips.txt
	    ./firewall_editor.sh $line_short b
	fi
    done < "$input"

echo "$counter Malicious IPs attained from blocklists and added to blocklist_ips.txt"
