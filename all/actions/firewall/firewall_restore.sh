#!/bin/bash

cp /etc/backups/firewall.orig /etc/config/firewall

/www/cyber-pizza/all/actions/firewall/blocklist_parser.sh
/www/cyber-pizza/all/actions/firewall/block_allow_helper.sh
/www/cyber-pizza/all/actions/firewall/block_allow_port_helper.sh

echo 'Your firewall has been reset to reflect your changes'
#uci commit firewall
#service firewall restart
