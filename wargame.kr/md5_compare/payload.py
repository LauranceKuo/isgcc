#!/usr/bin/python
# -*- coding:utf-8 -*-
#author:LauranceKuo
#date:2016-8-13
#
#to find a string which has md5 hash value with pattern 0e[0-9]{30}

import hashlib,sys,time.re
from itertools import *

express = "0e[0-9]{30,30}"

def hash_search(table, n):
        answer = 0
        for i in product(table, repeat = n):
                h = hashlib.md5(''.join(i))
                r = h.hexdigest()
                #print r
                e = re.search(express, r)
                if e:
                        print("find : %s" % e.group())
                        answer = ''.join(i)
                        break
        return answer

if __name__ == "__main__":
        string1 = [chr(i) for i in range(48,58)]
        string2 = [chr(i) for i in range(65,91)]
        string3 = [chr(i) for i in range(97,123)]
        print "Type 1: Number only. Type 2: Number with alphabet. Type 3: Alphabet only."
        misc_type = input("Choose type: ")
        if misc_type == 1:
                raw_table = string1
        elif misc_type == 2:
                raw_table = string1 + string2 + string3
        elif misc_type == 3:
                raw_table = string2 + string3
        else:
                print "Please choose 1 or 2 or 3. No other options."
                sys.exit()

        length = input("Define length: ")

        a = time.clock()
        flag = hash_search(raw_table, length)
        if flag != 0:
                print "The answer is " + flag
                b = time.clock()
                print "Program cost " + str(b - a)+ " seconds."
        if flag == 0:
                print "Could not find the answer."
                b = time.clock()
                print "Program cost " + str(b - a)+ " seconds."
