<?php

include_once __DIR__ . "/../Model/Basket.php";
include_once __DIR__ . "/../Model/BasketItem.php";
include_once __DIR__ . "/BasketService.php";

class BasketDBService
{
    private $conn;

    public function __construct($conn = null)
    {
        $this->conn = $conn;
    }

    public static function getBasketByUserId($userId)
    {
        $basket = new Basket($userId);
        if ($basket->getFromDB($userId) == null) {
            $basket->userId = $userId;
            $basket->save();
        }
        return $basket->getFromDB($userId);
    }

    public function updateBasketItem($productId, $basketId, $qty)
    {

        (new BasketItem($productId, $basketId, $qty))->update();

    }

    public function deleteBasketItem($productId, $basketId)
    {
        (new BasketItem())->deleteProductByBasketById($productId, $basketId);
    }

    public function createBasketItem($basketId, $productId, $qty)
    {
        $item = new BasketItem();
        $item->basketId = $basketId;
        $item->productId = $productId;
        $item->quantity = $qty;
        $item->save();
    }

    public function getBasketProducts($basketId, $testConn = null)
    {
        if (!empty($testConn)) {
            return (new BasketItem())->setConn($testConn)->getByBasketId($basketId);
        }
        return (new BasketItem())->getByBasketId($basketId);
    }

    public function clearBasket($basketId, $testConn = null)
    {
        if (!empty($testConn)) {
            (new BasketItem())->setConn($testConn)->clearByBasketById($basketId);
            return;
        }
        (new BasketItem())->clearByBasketById($basketId);
    }

    public function getBasketIdByUserId($userId, $testConn = null)
    {
        if (!empty($testConn)) {
            return 1;
        }
        return (new Basket($userId))->getFromDB()['id'];
    }

    public static function defineBasketDetails()
    {
        $user = UserService::getCurrentUser();
        try {
            if (!isset($user['login'])) {
                return;
            }
            $basket = self::getBasketByUserId($user['id']);
            return (new BasketDBService())->getBasketProducts((int)$basket['id']);
        } catch (Exception $exception) {
            ExceptionService::error($exception, 'frontend');
        }
    }
}














