#!/bin/bash

#This script grabs the lists from blocklists.txt and adds them to blocklist_ips.txt

mv /www/cyber-pizza/all/assets/data/blocklist_ips.txt /www/cyber-pizza/all/assets/data/blocklist_ips.prev.txt
touch /www/cyber-pizza/all/assets/data/blocklist_ips.txt

blocklists='/www/cyber-pizza/all/assets/data/blocklists.txt'
counter=0
#reads through list of blocklist URLs to parse through
while IFS= read -r line
do
    all_lists+=("$line")
done < "$blocklists"

#iterates through each blocklist
for list in ${all_lists[@]};
do
    #retrieves blocklist
    wget $list -O ./tmp_list.txt
    echo started processing for $list
    input='./tmp_list.txt'
    #iterates through lines of blocklist and adds all valid IPs to blocklist_ips.txt
    while IFS= read -r line
    do
	line_short=$(echo "$line" | cut -f1 -d "/")
	valid_ip=$(php-cgi ./validate_ip.php "$line_short" | tail -n 1)
	    #echo $line
	if [[ $valid_ip == "1" ]]; then
	    #echo $line
	    (( counter++ ))
	    echo $line_short >> /www/cyber-pizza/all/assets/data/blocklist_ips.txt
	    #instructs firewall_editor to parse through blocklist_ips.txt
	    ./firewall_editor.sh $line_short b 0
	fi
    done < "$input"
done

echo "$counter Malicious IPs attained from blocklists and added to blocklist_ips.txt"
