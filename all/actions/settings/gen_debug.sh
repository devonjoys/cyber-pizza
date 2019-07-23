#!/bin/bash

debug_temp=/www/cyber-pizza/all/assets/settings/debug-temp.txt
touch $debug_temp
echo "Debug log for:" >> $debug_temp
date >> $debug_temp















mv /www/cyber-pizza/all/assets/settings/debug-temp.txt /www/cyber-pizza/all/assets/settings/debug.txt
