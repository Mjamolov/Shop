<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/ValidationService.php";

$mysqlTypes = [
    'int' => 'int',
    'float' => 'decimal(10, 2)',
    'string' => 'varChar(255)',
];

$reserveFields = ['id'];

$objectReflection = new ReflectionClass('Product');
$properties = $objectReflection->getProperties();
foreach ($properties as $property) {
    print_r(ValidationService::validate($property->getDocComment()));
}
