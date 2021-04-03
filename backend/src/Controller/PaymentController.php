<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Payment.php";

class PaymentController extends AbstractController
{
    public function read()
    {
        $all = (new Payment())->all();

        include_once __DIR__ . "/../../views/payment/list.php";
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/payment/form.php";
    }

    public function save()
    {
        if (!empty($_POST)) {
            $payment = new Payment(
                intval($_POST["id"]),
                htmlspecialchars($_POST["title"]),
                htmlspecialchars($_POST["code"]),
                intval($_POST["priority"])
            );
            $payment->save();
        }
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET["id"];
        if (empty($id)) die("Undefined ID");

        $one = (new Payment())->getById($id);
        if (empty($one)) die("payment not found");

        include_once __DIR__ . "/../../views/payment/form.php";
    }

    public function delete()
    {
        $id = $_GET["id"];
        (new Payment())->deleteById($id);

        return $this->read();
    }
}