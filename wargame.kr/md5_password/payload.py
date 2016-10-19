from hashlib import md5
import itertools

a = "0123456789abcdefghijklmnopqrstuvwxyz~!@#$%^&*()_+|"

for key in itertools.product(a,repeat=4):
    #digest differs from hexdigest
    #in php code
    #md5('key', true)
    s = md5(''.join(key)).digest()
    if s.find('\'=\'')>0:
        print ''.join(key)
        print s.encode('hex')
        break
