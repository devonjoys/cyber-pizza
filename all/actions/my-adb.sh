#!/bin/bash

adb=$(uci show adblock.global.adb_enabled | cut -f2 -d "'")

touch ../assets/settings/my-adb-temp.txt
echo $adb >> ../assets/settings/my-adb-temp.txt
mv ../assets/settings/my-adb-temp.txt ../assets/settings/my-adb.txt
