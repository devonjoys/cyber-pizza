#!/bin/bash

#This script takes user input (from the front-end) to add regular scans to the crontab

input="/www/cyber-pizza/all/assets/settings/scan.txt"

times=$(cat $input)

#Determines where in crontab the relevant line is located
cron_line=$(grep -n scan /etc/crontabs/root | cut -f1 -d ":")
one_less=$(( $cron_line - 1 ))
one_more=$(( $cron_line + 1 ))

cp /etc/backups/empty /etc/crontabs/root.tmp
cat /etc/crontabs/root | head -n $one_less >> /etc/crontabs/root.tmp

#Adds the relevant line to the crontabs
if [[ "$times" == "0" ]]; then
	echo '#0 0 * * * bash /www/cyber-pizza/all/actions/scan/device_ports_inter.sh' >> /etc/crontabs/root.tmp
elif [[ "$times" == "7" ]]; then
	echo '0 3 * * * bash /www/cyber-pizza/all/actions/scan/device_ports_inter.sh' >> /etc/crontabs/root.tmp
elif [[ "$times" == "2" ]]; then
	echo '0 3 1,4 * * bash /www/cyber-pizza/all/actions/scan/device_ports_inter.sh' >> /etc/crontabs/root.tmp
elif [[ "$times" == "1" ]]; then
	echo '0 3 1 * * bash /www/cyber-pizza/all/actions/scan/device_ports_inter.sh' >> /etc/crontabs/root.tmp
else
	echo "Error. Invalid time"
fi

cat /etc/crontabs/root | tail -n +$one_more >> /etc/crontabs/root.tmp
mv /etc/crontabs/root.tmp /etc/crontabs/root

/etc/init.d/cron start
/etc/init.d/cron enable

