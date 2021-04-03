<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202103302029_migration_add_rbac.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddRbac($dbConnector);
$migration->commit();

die('OK');