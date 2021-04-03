<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture03
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => 'Product1',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product2',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product3',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product4',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product5',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product6',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product7',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product8',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product9',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],
        [
            'id' => 'null',
            'title' => 'Product10',
            'content' => '321',
            'created' => '2021-01-23 17:34:33',
        ],

    ];


    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $product)   {

        $result = mysqli_query($this->conn, "INSERT INTO news VALUE(
            " . $product['id'] . ",
            '" . $product['title'] . "', 
            '" . $product['content'] . "', 
            '" . $product['created'] . "'
        )");

        if (!$result) {
            echo mysqli_error($this->conn) . PHP_EOL;
        }

        }

    }
}
















