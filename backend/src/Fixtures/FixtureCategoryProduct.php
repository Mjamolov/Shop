<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureCategoryProduct
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'product_id' => '1',
        ],
        [
            'id' => 'null',
            'product_id' => '2',
        ],
        [
            'id' => 'null',
            'product_id' => '4',
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        $categoryProducts = [];

        for ($i = 0; $i <= 33; $i++) {
            $categoryProducts[] = sprintf("(%d,%d)", rand(1, 499), rand(1, 20));
        }
        $categoryProducts = array_unique($categoryProducts);
        $query = "INSERT INTO `category_product` VALUES " . implode(',', $categoryProducts);

        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}