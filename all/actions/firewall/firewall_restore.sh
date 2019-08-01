#!/bin/bash

#This script resets the firewall in case of updates or major changes

#Resets firewall file to original
cp /etc/backups/firewall.orig /etc/config/firewall

#Goes through blocklists to incorporate changes to firewall from default
/www/cyber-pizza/all/actions/firewall/blocklist_parser.sh

#Goes through manual IP and Port settings to change firewall from default
/www/cyber-pizza/all/actions/firewall/block_allow_helper.sh
/www/cyber-pizza/all/actions/firewall/block_allow_port_helper.sh

echo 'Your firewall has been reset to reflect your changes'
