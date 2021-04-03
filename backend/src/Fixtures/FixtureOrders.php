<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureOrders
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'user_id' => '1',
            'total' => '98',
            'payment_id' => '2',
            'delivery_id' => '13',
            'comment' => 'some text',
            'name' => 'mehrob',
            'phone' => '550550522',
            'email' => 'example@mail.com',
            'status' => '1',
            'created' => '2021-02-01 10:15:35',
            'updated' => '2021-02-02 10:15:30'
        ],
        [
            'id' => 'null',
            'user_id' => '2',
            'total' => '9831',
            'payment_id' => '2',
            'delivery_id' => '13',
            'comment' => 'some text',
            'name' => 'mehrob2',
            'phone' => '550550522',
            'email' => 'example@mail.com',
            'status' => '1',
            'created' => '2021-02-01 10:05:35',
            'updated' => '2021-02-02 10:05:30'
        ],
        [
            'id' => 'null',
            'user_id' => '4',
            'total' => '9831',
            'payment_id' => '2',
            'delivery_id' => '13',
            'comment' => 'some text',
            'name' => 'mehrob3',
            'phone' => '550550522',
            'email' => 'example@mail.com',
            'status' => '1',
            'created' => '2021-02-01 10:05:35',
            'updated' => '2021-02-02 10:05:30'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $order) {
            $result = mysqli_query($this->conn, "INSERT INTO `orders`
 (`user_id`,`total`,`payment_id`,`delivery_id`,`comment`,`name`,`phone`,`email`,`status`,`created`,`updated`)
 VALUES (
                             '" . $order['user_id'] . "',
                             '" . $order['total'] . "',
                             '" . $order['payment_id'] . "',
                             '" . $order['delivery_id'] . "',
                             '" . $order['comment'] . "',
                             '" . $order['name'] . "',
                             '" . $order['phone'] . "',
                             '" . $order['email'] . "',
                             '" . $order['status'] . "',
                             '" . $order['created'] . "',
                             '" . $order['updated'] . "'
                             )");
            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }
}