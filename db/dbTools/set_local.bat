set DB=ifc
set MYSQL=W:\usr\local\mysql5\bin\mysql

set SCRIPT_PATH=%~dp0

echo DROP DATABASE IF EXISTS `%DB%` | %MYSQL% -u root  -v
echo CREATE DATABASE `%DB%` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci | %MYSQL% -u root -v
%MYSQL% -u root %DB% -v < %SCRIPT_PATH%/../local.sql 2> error.tmp
%MYSQL% -u root %DB% -v < %SCRIPT_PATH%/../local_data.sql 2> error.tmp
rem %MYSQL% -u root %DB% -v < %SCRIPT_PATH%/../local_data_special.sql 2> error.tmp
rem %MYSQL% -u root %DB% -v < %SCRIPT_PATH%/../local_data_test.sql 2> error.tmp
call copy error.tmp con
@del  error.tmp
@echo Finish.
@pause
