#!/bin/bash

times=$1
summ=$2

#/etc/speedtestprocessor/jsonparse.sh | chroot /mnt/mmcblk0p3/ubuntu /bin/bash
chroot /mnt/mmcblk0p3/ubuntu /etc/speedtestprocessor/jsonparse.sh $times $summ
exit
/www/cyber-pizza/all/actions/performance/low_speed.sh
#chroot /mnt/mmcblk0p3/ubuntu /bin/bash <<"EOT"
#/etc/speedtestprocessor/jsonparse.sh $times
#EOT
