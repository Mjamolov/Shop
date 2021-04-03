<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class BasketItem extends AbstractModel
{
    public $productId;
    public $basketId;
    public $quantity;

    public function __construct(
        $productId = null,
        $basketId = null,
        $quantity = null
    )
    {
        parent::__construct();

        $this->productId = $productId;
        $this->basketId = $basketId;
        $this->quantity = $quantity;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;

        return $this;
    }

    public function update()
    {
        try {

            if (empty($this->basketId) || empty($this->productId) || empty($this->quantity)) {
                throw new Exception("Empty Basket Item Field");
            }
            $query = "UPDATE basket_item SET quantity=" . $this->quantity
                . " WHERE basket_id=" . $this->basketId
                . " AND product_id=" . $this->productId
                . " LIMIT 1";


            $result = mysqli_query($this->conn, $query);
            if (!$result) {
                throw new Exception(mysqli_error($this->conn));
            }
        } catch (Exception $exception) {
            ExceptionService::error($exception, "frontend");
        }
    }

    public function save()
    {
        try {
            $query = "INSERT INTO basket_item VALUES (null,'$this->basketId', '$this->productId', '$this->quantity')";

            $result = mysqli_query($this->conn, $query);
            if (!$result) {
                throw new Exception(mysqli_error($this->conn));
            }
        } catch (Exception $exception) {
            ExceptionService::error($exception, "frontend");
        }
    }

    public function getByBasketId($basketId)
    {
        $result = mysqli_query($this->conn, "select * from basket_item where basket_id = '$basketId'");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function deleteProductByBasketById($product_id, $basketId)
    {
        mysqli_query($this->conn, "delete from basket_item where product_id = '$product_id' and basket_id = '$basketId' limit 1");
    }

    public function clearByBasketById($basketId)
    {
        mysqli_query($this->conn, "delete from basket_item where basket_id = '$basketId'");
    }

}










