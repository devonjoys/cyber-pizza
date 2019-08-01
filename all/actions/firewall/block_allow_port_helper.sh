#!/bin/bash

#This script updates the firewall using the allowed and blocked ports inputed by the user

#Grabs relevant lists of allowed and blocked ports
allowed='/www/cyber-pizza/all/assets/data/allowed-ports.txt'
blocked='/www/cyber-pizza/all/assets/data/blocked-ports.txt'

allowed_temp='/www/cyber-pizza/all/assets/data/allowed-ports2.txt'
blocked_temp='/www/cyber-pizza/all/assets/data/blocked-ports2.txt'

cp $allowed $allowed_temp
cp $blocked $blocked_temp

echo -e "" >> $allowed
echo -e "" >> $blocked

#reads files and adds them to firewall accordingly
while IFS= read -r line
do
     if [[ -z "$line" ]]; then
	echo end
     else
	/www/cyber-pizza/all/actions/firewall/firewall_port_editor.sh $line a
     fi
done < "$allowed"

while IFS= read -r line
do
     if [[ -z "$line" ]]; then
	echo end
     else
	/www/cyber-pizza/all/actions/firewall/firewall_port_editor.sh $line b
     fi
done < "$blocked"

mv $allowed_temp $allowed
mv $blocked_temp $blocked
