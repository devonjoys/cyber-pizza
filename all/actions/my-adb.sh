#!/bin/bash

#This script checks whether adblock is enabled and adds it to my-adb-temp.txt

adb=$(uci show adblock.global.adb_enabled | cut -f2 -d "'")

touch /www/cyber-pizza/all/assets/settings/my-adb-temp.txt
echo $adb >> /www/cyber-pizza/all/assets/settings/my-adb-temp.txt
mv /www/cyber-pizza/all/assets/settings/my-adb-temp.txt /www/cyber-pizza/all/assets/settings/my-adb.txt
