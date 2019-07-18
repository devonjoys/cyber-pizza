#!/bin/bash

times=$1

#/etc/speedtestprocessor/jsonparse.sh | chroot /mnt/mmcblk0p3/ubuntu /bin/bash
chroot /mnt/mmcblk0p3/ubuntu /etc/speedtestprocessor/jsonparse.sh $times
#chroot /mnt/mmcblk0p3/ubuntu /bin/bash <<"EOT"
#/etc/speedtestprocessor/jsonparse.sh $times
#EOT
