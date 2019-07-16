#!/bin/bash

#This script grabs the lists from blocklists.txt and adds them to blocklist_ips.txt

mv ../assets/data/blocklist_ips.txt ../assets/data/blocklist_ips.prev.txt
touch ../assets/data/blocklist_ips.txt

#all_lists='cat $../assets/data/blocklists.txt'

blocklists='../assets/data/blocklists.txt'
counter=0
while IFS= read -r line
do
    all_lists+=("$line")
done < "$blocklists"

for list in ${all_lists[@]};
do
#    this_list=$(curl -# "${list}" 2> '/dev/null' )
    wget $list -O ./tmp_list.txt
    echo started processing for $list
##########################################################Implementation using curl
   # for ip in ${this_list};
    #do
#	valid_ip=$(php-cgi ./validate_ip.php "${ip[0]}" | tail -n 1)
#	if [[ $valid_ip == "1" ]]; then
#	    echo $ip >> ../assets/data/blocklist_ips.txt
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
	    #echo $line
	    $counter=$(($counter+1))
	    echo $line_short >> ../assets/data/blocklist_ips.txt
	    ./firewall_editor.sh $line_short b
	fi
    done < "$input"
done

echo '$counter Malicious IPs attained from blocklists and added to blocklist_ips.txt'
