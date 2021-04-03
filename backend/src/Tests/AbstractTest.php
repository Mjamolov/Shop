<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

abstract class AbstractTest
{
    protected $conn;
    const DB_PRODUCT_NAME = 'db_shop';
    const DB_TEST_NAME = 'db_shop_test';

    public function __construct()
    {
        $this->conn = new DBConnector(
            'localhost',
            'shop_test_user',
            'shop_test_user',
            'db_shop_test'
        );
    }

    public function copyTableByName($name)
    {
        mysqli_query($this->conn->connect(), "insert into " . self::DB_TEST_NAME . "." . $name .
            " select * from " . self::DB_PRODUCT_NAME . "." . $name);
    }

    public function createTableByName($name)
    {
        $query = "show create table " . self::DB_PRODUCT_NAME . "." . $name;

        $result = mysqli_query($this->conn->connect(), $query);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['Create Table'];

        mysqli_query($this->conn->connect(), $result);
        mysqli_query($this->conn->connect(), "truncate table " . self::DB_TEST_NAME . "." . $name);
    }

    public function dropTableByName($name) {
        $query = "drop table " . self::DB_TEST_NAME . "." . $name;
        mysqli_query($this->conn->connect(), $query);
    }
}