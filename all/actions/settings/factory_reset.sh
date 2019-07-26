#!/bin/bash



touch /www/cyber-pizza/all/assets/settings/initialized-temp.txt
echo 0 >> /www/cyber-pizza/all/assets/settings/initialized-temp.txt
mv /www/cyber-pizza/all/assets/settings/initialized-temp.txt /www/cyber-pizza/all/assets/settings/initialized.txt

cp /etc/backups/empty /www/cyber-pizza/all/actions/scan/devicetracklog.txt
cp /etc/backups/empty /www/cyber-pizza/all/actions/scan/devicelog.txt
cp /etc/backups/empty /www/cyber-pizza/all/actions/scan/device_ports_status.grep
cp /etc/backups/empty /www/cyber-pizza/all/actions/performance/summary.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/email-temp.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/all_speed_tests.txt
cp /etc/backups/empty /mnt/mmcblk0p3/etc/speedtestprocessor/all_speed_tests.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/allowed-ips.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/allowed-ports.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/allowed-ips-temp.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/blocked-ips-temp.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/blocked-ips.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/blocked-ports-temp.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/blocked-ports.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/blocklist_ips.prev.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/data/blocklist_ips.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/debug.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/frozen.txt
echo 0 >> /www/cyber-pizza/all/assets/settings/frozen.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/initialized.txt
echo 0 >> /www/cyber-pizza/all/assets/settings/initialized.txt
cp /etc/backups/login-errors.txt /www/cyber-pizza/all/assets/settings/login_errors.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/my-adb.txt
echo 1 >> /www/cyber-pizza/all/assets/settings/my-adb.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/my-conn.txt
echo 1 >> /www/cyber-pizza/all/assets/settings/my-conn.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/my-lan-ip.txt
echo 10.42.0.1 >> /www/cyber-pizza/all/assets/settings/my-lan-ip.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/my-ssid.txt
echo GuardianDevil >> /www/cyber-pizza/all/assets/settings/my-ssid.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/my-vpn.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/net-id.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/nmap_freq.txt
echo 7 >> /www/cyber-pizza/all/assets/settings/nmap_freq.txt
cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/performance.txt
echo 12 >> /www/cyber-pizza/all/assets/settings/performance.txt
cp /etc/backups/notifications.txt /www/cyber-pizza/all/assets/settings/notifications.txt
cp /etc/backups/twitter.txt /www/cyber-pizza/all/assets/settings/twitter.txt
cp /etc/backups/empty /www/cyber-pizza/all/actions/firewall/tmp_list.txt

cp /etc/backups/empty /www/cyber-pizza/all/assets/settings/
cp /etc/backups/empty /etc/openvpn/vpnclient.conf
mv /etc/openvpn/vpnclient.conf /etc/openvpn/vpnclientnull.conf

cp /etc/backups/blocklists.txt /www/cyber-pizza/all/assets/data/blocklists.txt
cp /etc/backups/blocklists.txt /www/cyber-pizza/all/assets/data/blocklists-temp.txt

/www/cyber-pizza/all/actions/firewall/firewall_restore.sh

cp /etc/backups/speed-server.txt /www/cyber-pizza/all/assets/settings/speed-server.txt
cp /etc/backups/adblock /etc/config/adblock
cp /etc/backups/dhcp /etc/config/dhcp
cp /etc/backups/firewall /etc/config/firewall
cp /etc/backups/network /etc/config/network
cp /etc/backups/openvpn /etc/config/openvpn
cp /etc/backups/wireless /etc/config/wireless
uci commit adblock
uci commit dhcp
uci commit firewall
uci commit network
uci commit openvpn
uci commit wireless
/www/cyber-pizza/all/actions/settings/update.sh

reboot
