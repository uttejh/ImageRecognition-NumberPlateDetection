#from __future__ import print_function  # Only needed for Python 2
#print("hi there", file=f)

f = open('myfile', 'w')
f.write('hi there\n')  # python will convert \n to os.linesep
f.close()