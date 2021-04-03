<?php

include_once __DIR__ . "/../../../common/src/Service/DataHelperService.php";

$array = [
    [1,2,3,4,5],
    [6,7,8,9,10],
];
$fullPath = __DIR__ . "/../../../data/some_file.csv";

print_r("export test..." . PHP_EOL);

DataHelperService::saveArrayToCsvFile($array, $fullPath);
print_r("OK" . PHP_EOL);

print_r("import test..." . PHP_EOL);
$result = DataHelperService::getArrayFromCsvFile($fullPath);
print_r($result);

die(PHP_EOL . "OK");