#!/bin/bash
cd "$( dirname "$0" )"
java -Xmx1024M -Xms1024M -XX:MaxPermSize=256M -Dfile.encoding=UTF-8 -jar craftbukkit-1.7.10-R0.1-20140808.005431-8.jar