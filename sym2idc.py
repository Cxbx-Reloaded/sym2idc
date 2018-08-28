#!/usr/bin/env python3
import sys, re

print('\n#include <idc.idc>\n\nstatic main()\n{')
lines = open(sys.argv[1], 'r').readlines()

for line in lines:
   if len(line) == 0:
      continue
   line = line.replace("$", "")
   endOfCommand = re.search("\;", line)
   addressDelimiter = re.search("=", line)
   if endOfCommand != None and addressDelimiter != None:
      print('      MakeName(0x' + line[addressDelimiter.end():endOfCommand.start()] +
            ', "' + line[:addressDelimiter.start()] + '");')
print('  }\n\n')
