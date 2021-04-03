<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureBasket
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'user_id' => '1',
        ],
        [
            'id' => '2',
            'user_id' => '2',
        ],
        [
            'id' => '3',
            'user_id' => '4',
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $basket) {
            $result = mysqli_query($this->conn, "INSERT INTO `basket` (`id`, `user_id`) VALUES (
                             '" . $basket['id'] . "',
                             '" . $basket['user_id'] . "'
                             )");
            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }
}