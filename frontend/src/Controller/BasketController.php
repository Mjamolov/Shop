<?php

include_once __DIR__ . "/../../../common/src/Service/BasketDBService.php";
include_once __DIR__ . "/../../../common/src/Service/BasketSessionService.php";
include_once __DIR__ . "/../../../common/src/Service/BasketCookieService.php";
include_once __DIR__ . "/../../../common/src/Model/BasketItem.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/ExceptionService.php";
include_once __DIR__ . "/../../../common/src/Service/ProductService.php";

class BasketController
{
    public $user;
    public $basket;
    public $items;
    public $basketService;

    public function __construct()
    {

        $this->user = UserService::getCurrentUser();
        if (!isset($this->user['login'])) {
            throw new Exception('No permission', 403);
        }
        $this->basket = BasketDBService::getBasketByUserId($this->user['id']);
        $this->basketService = new BasketDBService();
        $this->items = BasketDBService::defineBasketDetails();
    }

    public function addProduct()
    {
        try {
            $productId = (int)$_POST['product_id'];
            $qty = (int)$_POST['quantity'];

            if (empty($productId) || empty($qty)) {
                throw new Exception("Empty product");
            }

            foreach ($this->items as $item) {
                if ($item['product_id'] == $productId) {
                    $this->basketService->updateBasketItem($productId, $this->basket['id'], $item['quantity'] + $qty);

                    $this->redirectToBasket();
                    return;
                }
            }

            $this->basketService->createBasketItem($this->basket['id'], $productId, $qty);

            $this->redirectToBasket();
        } catch (Exception $exception) {
            ExceptionService::error($exception, "frontend");
        }
    }

    public function view()
    {
        $result = (new ProductService())->getBasketItems($this->items);
        $items = [];
        $total = 0;
        if(!empty($result)) {
            $items = $result['items'];
            $total = $result['total'];
        }
        include_once __DIR__ . "/../../views/basket/view.php";
    }


    public function delete()
    {
        $this->basketService->deleteBasketItem((int)$_POST['product_id'], $this->basket['id']);

        $this->redirectToBasket();
    }

    public function change()
    {
        $this->basketService->updateBasketItem((int)$_POST['product_id'], $this->basket['id'], (int)$_POST['quantity']);

        $this->redirectToBasket();

    }

    public function redirectToBasket()
    {
        header("location: http://localhost/php/Shop(stream13)/frontend/index.php?model=basket&action=view");
    }
}
