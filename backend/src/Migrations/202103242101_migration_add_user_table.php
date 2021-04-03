<?php

include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddUserTable {

    private $conn;

    public  function  __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {

        $result = mysqli_query($this->conn, "create table `user`(
                id int not null auto_increment,
                name varchar(256) not null,
                phone varchar(256) not null UNIQUE,
                email varchar(256) not null UNIQUE,
                password varchar(128) not null UNIQUE,
                roles varchar(256) not null,
                primary key(id) 
                ) engine= InnoDB default char set utf8");

        if (!$result) {
            echo mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "
            INSERT INTO `user`( `name`, `phone`, `email`, `password`, `roles`)
            VALUES ('superAdmin', '+992550550522', 'mehrob.jamolov@gmail.com', '". UserService::encodePassword('superAdmin') . "', '[\"ROLE_USER_ADMIN\"]')
            ");
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn,"DROP TABLE `user`");

        if (!$result) {
            echo mysqli_error($this->conn) . PHP_EOL;
        }
    }
}


















