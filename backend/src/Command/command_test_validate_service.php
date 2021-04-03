<?php

include_once __DIR__ . "/../../../common/src/Service/ValidatorService.php";

print_r("email validate" . PHP_EOL);
$result = ValidatorService::emailValidate("shohin@gmail.com");
var_dump($result);


print_r("phone validate" . PHP_EOL);
$result = ValidatorService::phoneValidate("985068686");
var_dump($result);

die(PHP_EOL . "OK");