<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureBasketItem
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'user_id' => '1',
            'product_id' => '3',
            'quantity' => '5'
        ],
        [
            'id' => '3',
            'user_id' => '2',
            'product_id' => '5',
            'quantity' => '6'
        ],
        [
            'id' => '5',
            'user_id' => '4',
            'product_id' => '3',
            'quantity' => '2'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $basketItem) {
            $result = mysqli_query($this->conn, "INSERT INTO `basket_item` VALUES (
                             '" . $basketItem['id'] . "',
                             '" . $basketItem['user_id'] . "',
                             '" . $basketItem['product_id'] . "',
                             '" . $basketItem['quantity'] . "'
                             )");
            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }
}