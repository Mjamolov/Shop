<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202103302029_migration_add_rbac.php";


$migration = new MigrationAddRbac(DBConnector::getInstance());
$migration->rollback();

die("OK");