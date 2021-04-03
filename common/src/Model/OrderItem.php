<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class OrderItem
{
    public $orderId;
    public $productId;
    public $quantity;

    private $conn;

    public function __construct(
        $orderId = null,
        $productId = null,
        $quantity = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function save()
    {
        $query = "INSERT INTO order_item VALUES (null, '" . $this->orderId . "', '" . $this->productId . "', '" . $this->quantity . "')";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function update()
    {
        if (empty($this->orderId) || empty($this->productId) || empty($this->quantity)) {
            throw new Exception("Empty Basket Item Field");
        }

        $query = " UPDATE order_item SET quantity = " . $this->quantity
            . " WHERE order_id =" . $this->orderId
            . " AND product_id = " . $this->productId
            . " limit 1";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function getByBasketId($orderId)
    {
        $result = mysqli_query($this->conn, "select * from order_item where order_id = $orderId ");
        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    public function deleteProductByOrderId($productId, $orderId)
    {
        mysqli_query($this->conn, "delete from order_item where product_id = $productId and order_id = $orderId limit 1");
    }

    public function clearByBasketId($orderId)
    {
        mysqli_query($this->conn, "delete from order_item where order_id = $orderId");

    }

}