#!/bin/bash

input="/www/cyber-pizza/all/assets/settings/performance.txt"

times=$(cat $input)

echo here $times

cron_line=$(grep -n performance /etc/crontabs/root | cut -f1 -d ":")
one_less=$(( $cron_line - 1 ))
one_more=$(( $cron_line + 1 ))
#touch tempyy.txt

#echo $one_less >> tempyy.txt
#echo $one_more >> tempyy.txt

cp /etc/backups/empty /etc/crontabs/root.tmp
cat /etc/crontabs/root | head -n $one_less >> /etc/crontabs/root.tmp

if [[ "$times" == "0" ]]; then
	echo '#0 0 * * * bash /www/cyber-pizza/all/actions/performance/json_chrooter.sh 5' >> /etc/crontabs/root.tmp
elif [[ "$times" == "2" ]]; then
	echo '0 3,15 * * * bash /www/cyber-pizza/all/actions/performance/json_chrooter.sh 5' >> /etc/crontabs/root.tmp
elif [[ "$times" == "6" ]]; then
	echo '0 */4 * * * bash /www/cyber-pizza/all/actions/performance/json_chrooter.sh 5' >> /etc/crontabs/root.tmp
elif [[ "$times" == "12" ]]; then
	echo '0 */2 * * * bash /www/cyber-pizza/all/actions/performance/json_chrooter.sh 5' >> /etc/crontabs/root.tmp
else
	echo "Error. Invalid time"
fi

cat /etc/crontabs/root | tail -n +$one_more >> /etc/crontabs/root.tmp
#cat /etc/crontabs/root.tmp >> tempyy.txt
mv /etc/crontabs/root.tmp /etc/crontabs/root

/etc/init.d/cron start
/etc/init.d/cron enable

