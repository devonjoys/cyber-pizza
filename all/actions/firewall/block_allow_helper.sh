#!/bin/bash

#This script updates the firewall using the allowed and blocked ip lists inputed by the user
#If this is done via a cron or a blockLIST, make sure the relevant blocklist scripts are called first


allowed='/www/cyber-pizza/all/assets/data/allowed-ips.txt'
blocked='/www/cyber-pizza/all/assets/data/blocked-ips.txt'

allowed_temp='/www/cyber-pizza/all/assets/data/allowed-ips2.txt'
blocked_temp='/www/cyber-pizza/all/assets/data/blocked-ips2.txt'

cp $allowed $allowed_temp
cp $blocked $blocked_temp

echo -e "" >> $allowed
echo -e "" >> $blocked

while read -r line
do
    if [[ -z "$line" ]]; then
    	echo end
    else
	echo $line
	/www/cyber-pizza/all/actions/firewall/firewall_editor.sh $line a
    fi
done < "$allowed"

while read -r line
do
    if [[ -z "$line" ]]; then
	echo end
    else
    	echo $line
    	/www/cyber-pizza/all/actions/firewall/firewall_editor.sh $line b
    fi
done < "$blocked"


#may remove these lines as all pieces come together
#uci commit firewall
#service network restart

mv $allowed_temp $allowed
mv $blocked_temp $blocked
