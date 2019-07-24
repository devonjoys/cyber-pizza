#!/bin/bash

ifdown wan
ifup wan
sleep 2
/etc/init.d/network restart
