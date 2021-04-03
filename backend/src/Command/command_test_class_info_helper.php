<?php

include_once __DIR__ . "/../../../common/src/Model/Order.php";
include_once __DIR__ . "/../../../common/src/Service/ClassInfoHelper.php";

$methods = ClassInfoHelper::getMethods(new Order());

print_r("getMethods:" . PHP_EOL);
print_r($methods);
print_r("OK" . PHP_EOL);

$variables = ClassInfoHelper::getVariables(new Order());
print_r("getVariables:" . PHP_EOL);
print_r($variables);
die("OK");