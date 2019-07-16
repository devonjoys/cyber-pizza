#!/bin/bash

#This script updates the firewall using the allowed and blocked ports inputed by the user

allowed='../assets/data/allowed-ports.txt'
blocked='../assets/data/blocked-ports.txt'

while IFS= read -r line
do
    ./firewall_port_editor.sh $line a
done < "$allowed"

while IFS= read -r line
do
    ./firewall_port_editor.sh $line b
done < "$blocked"


#may remove these lines as all pieces come together
uci commit firewall
service network restart
