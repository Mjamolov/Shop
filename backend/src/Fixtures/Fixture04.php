<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture04
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => 'Product1',
            'address' => 'Address1',
        ],
        [
            'id' => 'null',
            'title' => 'Product2',
            'address' => 'Address2',
        ],
        [
            'id' => 'null',
            'title' => 'Product3',
            'address' => 'Address3',
        ],
        [
            'id' => 'null',
            'title' => 'Product4',
            'address' => 'Address4',
        ],
        [
            'id' => 'null',
            'title' => 'Product5',
            'address' => 'Address5',
        ]
    ];


    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $product) {
            $result = mysqli_query($this->conn, "INSERT INTO shops VALUES (
                             '" . $product['id'] . "',
                             '" . $product['title'] . "',
                             '" . $product['address'] . "'
                             )");
            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }
}
















