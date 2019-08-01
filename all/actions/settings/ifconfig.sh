#!/bin/bash

#Generates an ifconfig output and adds it to ifconfig.txt

ifconfig | tee ifconfig.txt
