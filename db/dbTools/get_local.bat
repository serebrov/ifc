set DB=ifc
set MYSQLDUMP=\usr\local\mysql5\bin\mysqldump

set SKIP=--ignore-table=godemo.demo_pages_indexes

set SCRIPT_PATH=%~dp0

%MYSQLDUMP% -u root -c %DB% --no-data > %SCRIPT_PATH%\..\local.sql
%MYSQLDUMP% -u root -c %DB% --no-create-info %SKIP% > %SCRIPT_PATH%\..\local_data.sql
