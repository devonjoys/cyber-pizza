#!/bin/bash

ip=$(uci show network.lan.ipaddr | cut -f2 -d "'")

touch ../assets/settings/my-lan-ip-temp.txt
echo $ip >> ../assets/settings/my-lan-ip-temp.txt
mv ../assets/settings/my-lan-ip-temp.txt ../assets/settings/my-lan-ip.txt
