#!/bin/bash

$toggle=$1

if [[ "$toggle" == "1" ]]; then
	uci set openvpn.custom_config.enabled='1'
else
	uci set openvpn.custom_config.enabled='0'
fi
uci set openvpn
service openvpn restart
service network restart
