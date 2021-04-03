<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureOrderItems
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'order_id' => '2',
            'product_id' => '1',
            'quantity' => '13',
        ],
        [
            'id' => 'null',
            'order_id' => '2',
            'product_id' => '3',
            'quantity' => '12',
        ],
        [
            'id' => 'null',
            'order_id' => '2',
            'product_id' => '5',
            'quantity' => '4',
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $orderItem) {
            $result = mysqli_query($this->conn, "INSERT INTO `order_item` (`order_id`, `product_id`, `quantity`) VALUES (
                             '" . $orderItem['order_id'] . "',
                             '" . $orderItem['product_id'] . "',
                             '" . $orderItem['quantity'] . "'
                             )");
            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }
}