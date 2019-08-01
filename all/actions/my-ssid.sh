#!/bin/bash

#This script checks the network SSID and adds it to my-ssid.txt

ssid=$(uci show wireless.default_radio0.ssid | cut -f2 -d "'")

touch /www/cyber-pizza/all/assets/settings/my-ssid-temp.txt
echo $ssid >> /www/cyber-pizza/all/assets/settings/my-ssid-temp.txt
mv /www/cyber-pizza/all/assets/settings/my-ssid-temp.txt /www/cyber-pizza/all/assets/settings/my-ssid.txt
