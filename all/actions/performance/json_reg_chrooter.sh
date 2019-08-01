#!/bin/bash

#Executes regular speed tests in chroot based on input. Used primarily for crontabs

/www/cyber-pizza/all/actions/performance/json_chrooter.sh $1 $2
/www/cyber-pizza/all/actions/performance/low_speed.sh
