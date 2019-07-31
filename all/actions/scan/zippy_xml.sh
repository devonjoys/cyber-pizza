#!/bin/bash
chroot /mnt/mmcblk0p3/ubuntu
zip /etc/my_mail/scansummary.zip /etc/my_mail/device_ports_status.xml
exit