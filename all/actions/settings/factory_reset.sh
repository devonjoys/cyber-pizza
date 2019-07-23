#!/bin/bash



touch /www/cyber-pizza/all/assets/settings/initialized-temp.txt
echo 0 >> /www/cyber-pizza/all/assets/settings/initialized-temp.txt
mv /www/cyber-pizza/all/assets/settings/initialized-temp.txt /www/cyber-pizza/all/assets/settings/initialized.txt

/www/cyber-pizza/all/actions/settings/update.sh
reboot
