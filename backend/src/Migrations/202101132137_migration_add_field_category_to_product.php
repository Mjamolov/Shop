<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddFieldCategoryToProducts
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {
        $result = mysqli_query($this->conn, "ALTER TABLE products ADD category VARCHAR(63)");
        if (!$result) {
            print mysqli_error($result) . PHP_EOL;
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "ALTER TABLE products DROP COLUMN category");
        if (!$result) {
            print mysqli_error($result) . PHP_EOL;
        }
    }
}

















