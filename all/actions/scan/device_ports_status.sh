#!/bin/bash
#might need opkg upgrade coreutils-sort
#script to scan ports of all devices connected to ap and return port status for all
deviceNum=$(bash /www/cyber-pizza/all/actions/scan/connected_devices.sh info | grep 'Clients: ' | awk '{print $2}')

NMAP_FILE=/www/cyber-pizza/all/actions/scan/device_ports_status.grep
STATUS_FILE=/www/cyber-pizza/all/actions/scan/devicelog.txt

status=$(cat $STATUS_FILE)

open_ports() {
	for ip in $statu
	do
		nmap -oG $NMAP_FILE $ip >/dev/null
		egrep -v "^#|Status: Up" $NMAP_FILE | cut -d' ' -f2,4- | \
		sed -n -e 's/Ignored.*//p' | \
		awk -F, '{split($0,a," "); printf "Host: %-20s Ports Open: %d\n" , a[1], NF}' \
		| sort -k 5 -g
	done

}

top_ports() {
	#nmap -oG $NMAP_FILE -iL $STATUS_FILE >/dev/null
	egrep -v "^#|Status: Up" $NMAP_FILE | cut -d' ' -f4- | \
	sed -n -e 's/Ignored.*//p' | tr ',' '\n' | sed -e 's/^[ \t]*//' | \
	sort -n | uniq -c | sort -k 1 -r | head -n 50
}

port_detail() {
	for ip in $status
	do
		nmap -oG $NMAP_FILE $ip >/dev/null
		egrep -v "^#|Status: Up" $NMAP_FILE | cut -d' ' -f2,4- | \
		sed -n -e 's/Ignored.*//p'  | \
		awk '{print "Host: " $1  NF-1; $1=""; for(i=2; i<=NF; i++) { a=a" "$i; }; split(a,s,","); for(e in s) { split(s[e],v,"/"); printf "%-8s %s/%-7s %s\n" , v[2], v[3], v[1], v[5]}; a="" }'
	done
	
}

all_() {
	echo "------ top ports ------"
	top_ports
	echo "------ port information ------"
	port_detail
}

option=$1
case $option
in 
	openports) open_ports ;;
    topports) top_ports ;;
	portdetail) port_detail ;; 
 	all) all_ ;;
	*) echo "please specify an option, like: 'openports', 'topports', 'portdetail', or 'all'"
		exit ;;
esac

