#!/bin/bash

cp /etc/backups/firewall.orig /etc/config/firewall

./blocklist_parser.sh
./block_allow_helper.sh
./block_allow_port_helper.sh

echo 'Your firewall has been reset to reflect your changes'

#uci commit firewall
#service firewall restart
