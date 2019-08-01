#!/bin/bash

#This script checks what the Guardian Devil's lan IP address is (default 10.42.0.1) and adds it to my-lan-ip.txt

ip=$(uci show network.lan.ipaddr | cut -f2 -d "'")

touch /www/cyber-pizza/all/assets/settings/my-lan-ip-temp.txt
echo $ip >> /www/cyber-pizza/all/assets/settings/my-lan-ip-temp.txt
mv /www/cyber-pizza/all/assets/settings/my-lan-ip-temp.txt /www/cyber-pizza/all/assets/settings/my-lan-ip.txt
