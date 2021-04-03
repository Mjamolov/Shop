<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202101132201_migration_add_field_city_to_shops.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddCityToShops($dbConnector);
$migration->rollback();

die('OK');