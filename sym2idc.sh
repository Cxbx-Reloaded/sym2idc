#!/bin/bash

if [ ! -f "$1" ]; then
    echo "Selected input file not found!"
    exit 2
fi

SYMBOLLINE=`sed -n '1,$ { /\[Symbols\]/= }' "$1"`

echo "#include <idc.idc>

static main()
{"

sed "1, $SYMBOLLINE d" "$1" | tr -d '$' | sed '/^\s*$/d' | \
    awk -F ";" '{ print $1}' | \
    awk -F "=" '{print "      MakeName(0x" $2 ", \"" $1 "\");" }'
echo "  }"
