<?php

include_once __DIR__ . "/../../../common/src/Service/OrderService.php";
include_once __DIR__ . "/AbstractTest.php";
include_once __DIR__ . "/../../../common/src/Model/Order.php";
include_once __DIR__ . "/../Fixtures/Fixture01.php";
include_once __DIR__ . "/../Fixtures/FixtureOrders.php";
include_once __DIR__ . "/../Fixtures/FixtureOrderItems.php";

class OrderServiceTest extends AbstractTest
{
    const ESTIMATED_OUTCOME = 5772;

    public function testCalcTotal()
    {
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_item');

        $productFixture = new Fixture01($this->conn);
        $productFixture->run();

        $orderFixture = new FixtureOrders($this->conn);
        $orderFixture->run();

        $orderItemFixture = new FixtureOrderItems($this->conn);
        $orderItemFixture->run();

        $orderService = new OrderService();
        $orderObject = new Order();
        $orderObject->setConn($this->conn->connect());

        $quantityAndProducts = ($orderObject)->getProductsAndQuantityByOrderId(1);

        if (!method_exists($orderService, 'calcTotal')) {
            print 'Error: calcTotal() in not exist' . PHP_EOL;
            die('Test was crashed');
        }

        $total = $orderService->calcTotal($quantityAndProducts);

        if (self::ESTIMATED_OUTCOME !== $total) {
            print 'Error: calcTotal() in not correct' . PHP_EOL;
            die('Test was crashed');
        }

        $this->dropTableByName('products');
        $this->dropTableByName('orders');
        $this->dropTableByName('order_item');
    }
}