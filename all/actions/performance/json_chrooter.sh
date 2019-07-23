#!/bin/bash

times=$1
summ=$2
up=$3

while IFS= read -r line
do
	serv=$line
done < "/www/cyber-pizza/all/assets/settings/speed-server.txt"

#/etc/speedtestprocessor/jsonparse.sh | chroot /mnt/mmcblk0p3/ubuntu /bin/bash
chroot /mnt/mmcblk0p3/ubuntu /etc/speedtestprocessor/jsonparse.sh $times $summ $serv $up
exit
/www/cyber-pizza/all/actions/performance/low_speed.sh
#chroot /mnt/mmcblk0p3/ubuntu /bin/bash <<"EOT"
#/etc/speedtestprocessor/jsonparse.sh $times
#EOT
