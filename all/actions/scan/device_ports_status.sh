#!/bin/bash
#might need opkg upgrade coreutils-sort
#script to scan ports of all devices connected to ap and return port status for all
bash /www/cyber-pizza/all/actions/scan/connected_devices.sh info >/dev/null 
deviceNum=$(bash /www/cyber-pizza/all/actions/scan/connected_devices.sh population)

NMAP_FILE=/www/cyber-pizza/all/actions/scan/device_ports_status.grep
NMAP_FILE_XML=/www/cyber-pizza/all/actions/scan/device_ports_status.xml
STATUS_FILE=/www/cyber-pizza/all/actions/scan/testdevicelog.txt

status=$(cat $STATUS_FILE)

open_ports() {
	FILE=/www/cyber-pizza/all/actions/scan/open_port_check.txt

	#   if [[ -f $FILE ]] ; then
	#   	: > $FILE
	#   else
	#   	touch $FILE
	#   fi

	# nmap -oG $NMAP_FILE -oX $NMAP_FILE_XML -iL $STATUS_FILE
	# egrep -v "^#|Status: Up" $NMAP_FILE | cut -d' ' -f2,4- | \
	# sed -n -e 's/Ignored.*//p' | \
	# awk -F, '{split($0,a," "); printf "Host: %-20s Ports Open: %d\n" , a[1], NF}' \
	# | sort -k 5 -g | tee -a /www/cyber-pizza/all/actions/scan/open_port_check.txt

	portcheckAr=$(cat $FILE)
	lineNum=1
	warnCount=0
	declare -a portsWatch
	declare -a hosts
	for item in $portcheckAr
	do
		if [[ $(( "$lineNum" % 5 )) == 0 && "$item" -gt 2 ]]
		
		then
			portsWatch+=($item)
			(( warnCount++ ))
		fi
		if [[ $item == *.* ]]
		then
			hosts+=($item)
		fi 
		(( lineNum++ ))
	done

	if [[ $warnCount -gt 0 ]]
	then 
		emailText="Please monitor these device ports: "
		for (( i=0; i<$warnCount; i++ ));
		do
			emailText="$emailText <----> IP ${hosts[$i]} has ${portsWatch[$i]} ports open"
		done

	fi

	mv /www/cyber-pizza/all/actions/scan/device_ports_status.xml /mnt/mmcblk0p3/ubuntu/etc/my_mail/device_ports_status.xml 
	/etc/init.d/emailnotification.sh start 2 $deviceNum $emailText "/mnt/mmcblk0p3/ubuntu/etc/my_mail/device_ports_status.xml"
}

top_ports() {
	nmap -oG $NMAP_FILE -iL $STATUS_FILE >/dev/null
	egrep -v "^#|Status: Up" $NMAP_FILE | cut -d' ' -f4- | \
	sed -n -e 's/Ignored.*//p' | tr ',' '\n' | sed -e 's/^[ \t]*//' | \
	sort -n | uniq -c | sort -k 1 -r | head -n 50
}

port_detail() {
	nmap -oG $NMAP_FILE $ip >/dev/null
	egrep -v "^#|Status: Up" $NMAP_FILE | cut -d' ' -f2,4- | \
	sed -n -e 's/Ignored.*//p'  | \
	awk '{print "Host: " $1  NF-1; $1=""; for(i=2; i<=NF; i++) { a=a" "$i; }; split(a,s,","); for(e in s) { split(s[e],v,"/"); printf "%-8s %s/%-7s %s\n" , v[2], v[3], v[1], v[5]}; a="" }'
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

