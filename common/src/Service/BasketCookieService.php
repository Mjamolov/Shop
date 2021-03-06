<?php

include_once __DIR__ . "/../Model/Basket.php";
include_once __DIR__ . "/../Model/BasketItem.php";
include_once __DIR__ . "/../Service/BasketService.php";

class BasketCookieService extends BasketService
{
    const TIME_EXPIRED = 3600;

    /**
     * @param $basketId
     * @return array
     */
    public function getBasketProducts($basketId)
    {
        $data = $_COOKIE['basket'] ?? [];

        if (empty($data) && sizeof($data) == 0) {
            return $data;
        }

        return unserialize($data);
    }

    public static function  getBasketByUserId($userId)
    {

    }
    public function  updateBasketItem($basketId, $productId, $qty)
    {
        $data = $this->getBasketProducts($basketId);

        foreach ($data as $key=>$item) {
            if ($item['product_id'] === $productId) {
                $data[$key]['quantity'] = $qty;
            }
        }

        $this->save($data);
    }

    public function  deleteBasketItem($productId, $basketId)
    {

    }

    public function createBasketItem($basketId, $productId, $qty)
    {
        $item = [
            'product_id' => $productId,
            'basket_id' => $basketId,
            'quantity' => $qty,
        ];

        $data = $this->getBasketProducts($basketId);
        $data[] = $item;
//        $_COOKIE['basket'] = serialize($data);

        $this->save($data);
    }

    public function save($data)
    {
        // log()
        setcookie('basket', serialize($data), time() + self::TIME_EXPIRED);
    }

    public function clearBasket($basketId)
    {
        // TODO: Implement clearBasket() method.
    }

    public function getBasketIdByUserId($userId)
    {
        // TODO: Implement getBasketIdByUserId() method.
    }
}
















