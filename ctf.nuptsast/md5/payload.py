#!/usr/bin/python
# -*- coding:utf-8 -*-

# 有一点没考虑，就是明文数字的存在，但是答案出来了，就这样吧
import md5
import string
for i in string.uppercase:
    for j in string.uppercase:
        for k in string.uppercase:
            a='TASC'+i+'O3RJMV'+j+'WDJKX'+k+'ZM'
            b=a
            c=md5.md5(a).hexdigest()
            if(c[0:5]=='e9032'):
                print c
