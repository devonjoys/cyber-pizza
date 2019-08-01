#!/usr/bin/python3

# -*- coding: utf-8 -*-
"""
Created on Wed Jul 17 16:31:04 2019

@author: cyberpizza team
"""
#This script converts last_speed_test into a readable format with delimiters for the front-end output

#% Import relevant packages
import sys

#% Define functionality
def main():
    #Grab data from last speed test
    path_to_file="/www/cyber-pizza/all/assets/data/last_speed_test.txt"
    file1 = open(path_to_file,"r")  
      my_input = file1.read() 
    my_input_list = my_input.split()
	
    #Parses through each value within last_speed_test.txt
    loc=my_input_list[3]
    download=float(my_input_list[4]) / 1000000
    upload=float(my_input_list[5]) / 1000000
    time=my_input_list[6][12:20]
    date=my_input_list[6][1:11]
    lat=float(my_input_list[7])

    #Prints outputs in correct format, with Category vs. Value delimited by @ and internal delimination with &
    print("Date:&Time:&Server Location:&Download Speed:&Upload Speed:&Latency:@%s&%s&%s&%0.3f&%0.3f&%0.1f" % (date, time, loc, download, upload, lat))

#% Run on call
if __name__ == "__main__":
    main()


