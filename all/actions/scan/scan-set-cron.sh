#!/bin/bash

input="/www/cyber-pizza/all/assets/settings/scan.txt"

times=$(cat $input)

echo here $times

cron_line=$(grep -n scan /etc/crontabs/root | cut -f1 -d ":")
one_less=$(( $cron_line - 1 ))
one_more=$(( $cron_line + 1 ))


#echo $one_less >> tempyy.txt
#echo $one_more >> tempyy.txt

cp /etc/backups/empty /etc/crontabs/root.tmp
cat /etc/crontabs/root | head -n $one_less >> /etc/crontabs/root.tmp

#device_ports_status.sh topports
#device_ports_status.sh portdetail


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
#cat /etc/crontabs/root.tmp >> tempyy.txt
mv /etc/crontabs/root.tmp /etc/crontabs/root

/etc/init.d/cron start
/etc/init.d/cron enable

