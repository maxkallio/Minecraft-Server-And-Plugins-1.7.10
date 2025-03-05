#!/bin/sh
 BINDIR=$(dirname "$(readlink -fn "$0")")
 cd "$BINDIR"
java -Xincgc -Xms1024M -Xmx1024M -XX:MaxPermSize=128M -Dfile.encoding=UTF-8 -jar craftbukkit-1.7.10-R0.1-20140808.005431-8.jar
exit 0
