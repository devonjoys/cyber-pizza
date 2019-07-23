#!/bin/bash

opkg update
echo "y" | opkg upgrade luci nmap uhttpd 


/www/cyber-pizza/all/actions/perforance/json_chrooter.sh 1 s u


touch /www/cyber-pizza/all/assets/settings/last-update-temp.txt
date >> /www/cyber-pizza/all/assets/settings/last-update-temp.txt
mv /www/cyber-pizza/all/assets/settings/last-update-temp.txt /www/cyber-pizza/all/assets/settings/last-update.txt

chroot /mnt/mmcblk0p3/ubuntu /etc/update/update.sh
