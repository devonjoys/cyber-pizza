# -*- coding: utf-8 -*-
"""
Created on Wed Jul 17 16:31:04 2019

@author: cyberpizza team
"""
#!/usr/bin/python3

#test 0 | "Durham,NC"                   50946655.98528919             54693700.61157013             "2019-07-17T19:11:22.619416Z" 17.484
import sys

def main():
    # print command line arguments
    path_to_file="../../assets/data/last_speed_test.txt"
    path_to_file="./last_speed_test.txt"
    file1 = open(path_to_file,"r")  
  
    my_input = file1.read() 
    my_input_list = my_input.split()
    loc=my_input_list[3]
    download=float(my_input_list[4]) / 1000000
    upload=float(my_input_list[5]) / 1000000
    time=my_input_list[6][12:20]
    date=my_input_list[6][1:11]
    lat=float(my_input_list[7])
    
    #Print "Last Speed Test" too in bold
    print("\nDate: \t\t\t%s\nTime: \t\t\t%s\nServer Location: \t%s\nDownload Speed: \t%0.3f Mbps\nUpload Speed: \t\t%0.3f Mbps\nLatency: \t\t%0.1f" % (date, time, loc, download, upload, lat))
if __name__ == "__main__":
    main()