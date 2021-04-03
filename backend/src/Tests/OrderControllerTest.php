<?php

include_once __DIR__ . "/AbstractTest.php";
include_once __DIR__ . "/../../../frontend/src/Controller/OrderController.php";
include_once __DIR__ . "/../Fixtures/FixtureBasket.php";
include_once __DIR__ . "/../Fixtures/FixtureBasketItem.php";
include_once __DIR__ . "/../Fixtures/FixtureOrderItems.php";

class OrderControllerTest extends AbstractTest
{
    public function testCreate()
    {
        // Added Products to Basket
        // Create Table for Basket
        $this->createTableByName('basket');
        $this->createTableByName('basket_item');
        $this->createTableByName('user');
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_Item');

        $this->copyTableByName('user');
        $this->copyTableByName('products');
        // Run migration  for basket and Basket item
        (new FixtureBasket($this->conn))->run();
        (new FixtureBasketItem($this->conn))->run();
        (new FixtureOrderItems($this->conn))->run();

        // Submit  Order form
        $_POST = [
            'name' => 'mehrob',
            'phone' => '123456789',
            'email' => 'gs@mailcom',
            'delivery' => '2',
            'payment' => '2',
            'comment' => 'some text'
        ];
        $orderController = new OrderController($this->conn->connect());
        $orderController->create();

        // Check Exist Order in DB
        $orders = (new Order())->setConn($this->conn->connect())->all();
        if (sizeof($orders) !== 1) {
            print "Error: wrong Orders count" . PHP_EOL;
            die('TEST WAS CRASHED');
        }

        $order = reset($orders);

        foreach (['email' => $_POST['email'], 'phone' => $_POST['phone']] as $key => $value) {
            if ($order[$key] !== $value) {
                print "Error: wrong value " . $key . PHP_EOL;
                die('TEST WAS CRASHED');
            }
        }

        $orderItems = (new OrderItem())->setConn($this->conn->connect())->getByOrderId($order['id']);

        $_POST = [];
        // Drop test tables
        $this->dropTableByName('basket');
        $this->dropTableByName('basket_item');
        $this->dropTableByName('order_item');
        $this->dropTableByName('orders');
        $this->dropTableByName('user');
        $this->dropTableByName('products');
    }
}