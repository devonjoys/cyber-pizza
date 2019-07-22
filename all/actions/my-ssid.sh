#!/bin/bash

ssid=$(uci show wireless.default_radio0.ssid | cut -f2 -d "'")

touch ../assets/settings/my-ssid-temp.txt
echo $ssid >> ../assets/settings/my-ssid-temp.txt
mv ../assets/settings/my-ssid-temp.txt ../assets/settings/my-ssid.txt
