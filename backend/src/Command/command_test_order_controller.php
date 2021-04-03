<?php
include_once __DIR__ . "/../Tests/OrderControllerTest.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$test = new OrderControllerTest();
$test->testCreate();

die('Success!');