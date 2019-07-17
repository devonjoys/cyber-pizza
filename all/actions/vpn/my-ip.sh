#!/bin/bash

cp /etc/backups/empty ./my-ip.txt
curl ifconfig.me/ip >> ./my-ip.txt
echo curl ifconfig.me/ip
