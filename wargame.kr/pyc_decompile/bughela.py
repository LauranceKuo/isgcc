# 2016.08.15 19:24:23 CST
# Embedded file name: bughela.py
import time
from sys import exit
from hashlib import sha512

def main():
    print 'import me :D'


def GIVE_ME_FLAG(flag):
    if flag[:43] != 'http://wargame.kr:8080/pyc_decompile/?flag=':
        die()
    flag = flag[43:]
    now = time.localtime(time.time())
    seed = time.strftime('%m/%d/HJEJSH', time.localtime())
    hs = sha512(seed).hexdigest()
    start = now.tm_hour % 3 + 1
    end = start * (now.tm_min % 30 + 10)
    ok = hs[start:end]
    if ok != flag:
        die()
    print 'GOOD!!!'


def die():
    print 'NOPE...'
    exit()


if __name__ == '__main__':
    main()
