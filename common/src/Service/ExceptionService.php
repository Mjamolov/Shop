<?php


class ExceptionService
{
    public static function error(Exception $exception, $side)
    {
        http_response_code($exception->getCode());
        error_log("Exception: " . $exception->getMessage() . ", file: " . $exception->getFile() . " on line " . $exception->getLine());
        $code = $exception->getCode();
        $message = $exception->getMessage();
        include_once __DIR__ . "/../../../". $side ."/views/exceptions/400.php";
    }
}






