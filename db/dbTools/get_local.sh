#!/bin/sh

DB="ifc"
MYSQLDUMP=mysqldump

#SKIP=--ignore-table=$DB.appceo.pages_indexes
SKIP="--ignore-table=$DB.log"
SKIP_DATA="--ignore-table=$DB.app"
SKIP_TEST="--ignore-table=$DB.activity_action"

SCRIPT_PATH=`dirname $0`

$MYSQLDUMP -u root -c $DB --no-data > $SCRIPT_PATH/../local.sql
$MYSQLDUMP -u root -c $DB --no-create-info $SKIP $SKIP_DATA > $SCRIPT_PATH/../local_data.sql
# $MYSQLDUMP -u root -c $DB --no-create-info $SKIP $SKIP_TEST > $SCRIPT_PATH/../local_data_test.sql
