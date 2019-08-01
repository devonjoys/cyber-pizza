#!/bin/bash

#number of speed tests to run (default 4)
times=$1
#whether to add new tests to summary graph (if input is 's') (default no)
summ=$2
#whether to update speed test parsing scripts
up=$3

#reads server to test against
while IFS= read -r line
do
	serv=$line
done < "/www/cyber-pizza/all/assets/settings/speed-server.txt"

#executes speed tests and relevant processing in chroot
chroot /mnt/mmcblk0p3/ubuntu /etc/speedtestprocessor/jsonparse.sh $times $summ $serv $up
exit
echo -e "\n"
/www/cyber-pizza/all/actions/performance/low_speed.sh
