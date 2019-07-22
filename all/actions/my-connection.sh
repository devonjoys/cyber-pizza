#!/bin/bash

conn=$(ping 8.8.8.8 -c 1 | grep packet | cut -f3 -d "," | cut -f2 -d " " | cut -f1 -d "%")

if [[ "$conn" == "0" ]]; then
	conn_bool=false
else
	conn_bool=true
fi

touch ../assets/settings/my-conn-temp.txt
echo $conn_bool >> ../assets/settings/my-conn-temp.txt
mv ../assets/settings/my-conn-temp.txt ../assets/settings/my-conn.txt
