#!/bin/sh

DB="ifc_test"
MYSQL=mysql

SCRIPT_PATH=`dirname $0`

echo DROP DATABASE IF EXISTS $DB | $MYSQL -u root  -v
echo CREATE DATABASE $DB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci | $MYSQL -u root -v
$MYSQL -u root $DB -v < $SCRIPT_PATH/../local.sql 2> error.tmp
cat error.tmp
rm error.tmp
echo Finish.
read key
