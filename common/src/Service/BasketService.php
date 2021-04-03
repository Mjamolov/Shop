<?php

include_once __DIR__ . "/Interfaces/BasketInterface.php";
include_once __DIR__ . "/BasketDBService.php";
include_once __DIR__ . "/ExceptionService.php";
include_once __DIR__ . "/UserService.php";

abstract class BasketService implements BasketInterface
{
    abstract public static function getBasketByUserId($userId);

    abstract public function updateBasketItem($productId, $basketId, $qty);

    abstract public function deleteBasketItem($productId, $basketId);

    abstract public function createBasketItem($basketId, $productId, $qty);

    abstract public function getBasketProducts($basketId);

    abstract public function clearBasket($basketId);

    abstract public function getBasketIdByUserId($userId);

}
















