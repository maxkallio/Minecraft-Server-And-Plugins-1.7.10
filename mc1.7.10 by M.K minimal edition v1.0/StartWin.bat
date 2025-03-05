@ECHO OFF
SET BINDIR=%~dp0
CD /D "%BINDIR%"
java -Xincgc -Xms1024M -Xmx1024M -Dfile.encoding=UTF-8 -jar craftbukkit-1.7.10-R0.1-20140808.005431-8.jar