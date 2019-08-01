#!/bin/bash

#attempts to troubleshoot the internet connection by restarting network interfaces

ifdown wan
ifup wan
sleep 2
/etc/init.d/network restart
