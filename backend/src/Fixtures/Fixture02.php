<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture02
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => 'Product1',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product2',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product3',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product4',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product5',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product6',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product7',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product8',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product9',
            'group_id' => '321',
            'parent_id' => '123',
        ],
        [
            'id' => 'null',
            'title' => 'Product10',
            'group_id' => '321',
            'parent_id' => '123',
        ],
    ];


    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $product)   {

        $result = mysqli_query($this->conn, "INSERT INTO categories VALUE(
            " . $product['id'] . ",
            '" . $product['title'] . "', 
            '" . $product['group_id'] . "', 
            '" . $product['parent_id'] . "'
        )");

        if (!$result) {
            echo mysqli_error($this->conn) . PHP_EOL;
        }

        }

//        copy(__DIR__ . "/../../fixtures_pics/01.jpg", __DIR__ . "/../../../uploads/products/01.jpg");
//
//        $result = mysqli_query($this->conn, "INSERT INTO products VALUE(
//        null,
//        'Ноутбук Lenovo',
//        '01.jpg',
//        'Lionel Andrés Messi[note 1] (Spanish pronunciation',
//        '2021-01-24 12:32:33',
//        '321',
//        '123',
//        '2021-01-23 17:34:33',
//        '2021-01-24 12:32:33'
//        )");
//
//        if (!$result) {
//            echo mysqli_error($this->conn) . PHP_EOL;
//        }
//
//        copy(__DIR__ . "/../../fixtures_pics/02.jpg", __DIR__ . "/../../../uploads/products/02.jpg");
//
//        $result = mysqli_query($this->conn, "INSERT INTO products VALUE(
//        null,
//        'Lionel Messi',
//        '02.jpg',
//        'Lionel Andrés Messi[note 1] (Spanish pronunciation',
//        '2021-01-24 12:32:33',
//        '321',
//        '123',
//        '2021-01-23 17:34:33',
//        '2021-01-24 12:32:33'
//        )");
//
//        if (!$result) {
//            echo mysqli_error($this->conn) . PHP_EOL;
//        }
//
//        copy(__DIR__ . "/../../fixtures_pics/03.jpg", __DIR__ . "/../../../uploads/products/03.jpg");
//        $result = mysqli_query($this->conn, "INSERT INTO products VALUE(
//        null,
//        'Ноутбук Lenovo Ideapad',
//        '03.jpg',
//        'Lionel Andrés Messi[note 1] (Spanish pronunciation',
//        '2021-01-24 12:32:33',
//        '321',
//        '123',
//        '2021-01-23 17:34:33',
//        '2021-01-24 12:32:33'
//        )");
//
//        if (!$result) {
//            echo mysqli_error($this->conn) . PHP_EOL;
//        }
//        copy(__DIR__ . "/../../fixtures_pics/04.jpg", __DIR__ . "/../../../uploads/products/04.jpg");
//        $result = mysqli_query($this->conn, "INSERT INTO products VALUE(
//        null,
//        'Lionel Messi',
//        '04.jpg',
//        'Lionel Andrés Messi[note 1] (Spanish pronunciation',
//        '2021-01-24 12:32:33',
//        '321',
//        '123',
//        '2021-01-23 17:34:33',
//        '2021-01-24 12:32:33'
//        )");
//
//        if (!$result) {
//            echo mysqli_error($this->conn) . PHP_EOL;
//        }
//        copy(__DIR__ . "/../../fixtures_pics/05.jpg", __DIR__ . "/../../../uploads/products/05.jpg");
//        $result = mysqli_query($this->conn, "INSERT INTO products VALUE(
//        null,
//        'Lionel Messi',
//        '05.jpg',
//        'Lionel Andrés Messi[note 1] (Spanish pronunciation',
//        '2021-01-24 12:32:33',
//        '321',
//        '123',
//        '2021-01-23 17:34:33',
//        '2021-01-24 12:32:33'
//        )");
//
//        if (!$result) {
//            echo mysqli_error($this->conn) . PHP_EOL;
//        }
    }
}
















