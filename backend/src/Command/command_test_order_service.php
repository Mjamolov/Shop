<?php
include_once __DIR__ . "/../Tests/OrderServiceTest.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$test = new OrderServiceTest();
$test->testCalcTotal();

die('Success!');