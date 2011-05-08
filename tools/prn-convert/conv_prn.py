import sys

#fileName = '100inp.prn'

fileName = sys.argv[1]
# fileNameOut = '100inp.out'

f = open(fileName,'rt')
values = []
for line in f.readlines():
    for val in line.split():
        if (val):
            values.append(val)

count = int(values[0])
lines = []
#y = values[-count:]
lines.append(values[-count:])
#x = values[-count*2:-count]
lines.append(values[-count*2:-count])
#special = values[:-count*2]
lines.append(values[:-count*2])

for i in range(count):
    out = ""
    for line in lines:
        if (len(line) > i):
            out += line[i] + ' '
        else:
            out += ' '
    print out
