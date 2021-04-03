<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202101132051_migration_add_field_prior_to_categories.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddFieldPriorToCategory($dbConnector);
$migration->commit();

die('OK');