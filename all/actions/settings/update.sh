#!/bin/bash

#This script updates the device and all relevant packages

opkg update
echo "y" | opkg upgrade luci nmap uhttpd 


/www/cyber-pizza/all/actions/performance/json_chrooter.sh 1 s u


touch /www/cyber-pizza/all/assets/settings/last-update-temp.txt
date >> /www/cyber-pizza/all/assets/settings/last-update-temp.txt
mv /www/cyber-pizza/all/assets/settings/last-update-temp.txt /www/cyber-pizza/all/assets/settings/last-update.txt

#pull from git placeholder

#This script updates things in chroot
chroot /mnt/mmcblk0p3/ubuntu /etc/update/update.sh
