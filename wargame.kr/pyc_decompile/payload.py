# !/usr/bin/env python
# -*- coding: utf-8 -*-
# @author LauranceKuo
# @version 2016-08-15
from pwn import *
from hashlib import sha512
import requests
import time
import datetime

s = requests.Session()
url = 'http://wargame.kr:8080/pyc_decompile'
urlf = 'http://wargame.kr:8080/pyc_decompile/?flag='

def get_flag():
    r = s.get(url)
    server_time = r.text[r.text.find('<h1>') +  4 : r.text.find('</h1>')]
    server_time = datetime.datetime.strptime(server_time, '%Y/%m/%d %H:%M:%S')
    #now = time.localtime(time.time())
    seed = server_time.strftime('%m/%d/HJEJSH')
    hs = sha512(seed).hexdigest()
    start = server_time.tm_hour % 3 + 1
    end = start * (server_time.tm_min % 30 + 10)
    ok = hs[start:end]
    r = s.get(urlf + ok)
    print r.text

def main():
    get_flag()

if __name__ == "__main__":
    main()
