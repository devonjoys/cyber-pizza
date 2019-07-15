#!/bin/bash

#This script updates the firewall using the allowed and blocked ip lists inputed by the user
#If this is done via a cron or a blockLIST, make sure the relevant blocklist scripts are called first


allowed='../assets/data/allowed-ips.txt'
blocked='../assets/data/blocked-ips.txt'

while IFS= read -r line
do
    ./firewall_editor.sh $line a
done < "$allowed"

while IFS= read -r line
do
    ./firewall_editor.sh $line b
done < "$blocked"


#may remove these lines as all pieces come together
uci commit firewall
service network restart
