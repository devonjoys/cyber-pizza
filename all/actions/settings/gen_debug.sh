#!/bin/bash

debug_temp=/www/cyber-pizza/all/assets/settings/debug-temp.txt
touch $debug_temp
echo "Debug log for:" >> $debug_temp
date >> $debug_temp
cat /www/cyber-pizza/all/assets/settings/net-id.txt >> $debug_temp
echo "---------------------------" >> $debug_temp

echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
echo "ps------" >> $debug_temp
ps >> $debug_temp
echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
echo "netstat------" >> $debug_temp
netstat >> $debug_temp
echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
echo "/etc/config/network-----" >> $debug_temp
cat /etc/config/network >>$debug_temp
echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
echo "/etc/config/wireless------" >> $debug_temp
cat /etc/config/wireless >> $debug_temp
echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
echo "/etc/config/firewall----- first 100 lines" >> $debug_temp
echo "firewall size" >> $debug_temp
du -k /etc/config/firewall >> $debug_temp
cat /etc/config/firewall | head -n 100 >> $debug_temp

echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
echo "speed test------" >> $debug_temp
cat /www/cyber-pizza/all/assets/data/last_speed_test.txt >> $debug_temp

echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
echo "adblock,connection,vpn status" >> $debug_temp
cat /www/cyber-pizza/all/assets/settings/my-adb.txt >> $debug_temp
echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
cat /www/cyber-pizza/all/assets/settings/my-conn.txt >> $debug_temp
echo -e "*-*-*-*-*-*-*\n" >> $debug_temp
cat /www/cyber-pizza/all/assets/settings/my-vpn.txt >> $debug_temp
echo -e "*-*-*-*-*-*-*\n" >>$debug_temp
echo "speed test server" >> $debug_temp
cat /www/cyber-pizza/all/assets/settings/speed-server.txt >> $debug_temp












mv /www/cyber-pizza/all/assets/settings/debug-temp.txt /www/cyber-pizza/all/assets/settings/debug.txt
