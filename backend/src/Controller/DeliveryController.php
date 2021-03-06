<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Delivery.php";

class DeliveryController extends AbstractController
{
    public function read()
    {
        $all = (new Delivery())->all();

        include_once __DIR__ . "/../../views/delivery/list.php";
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/delivery/form.php";
    }

    public function save()
    {
        if (!empty($_POST)) {
            $delivery = new Delivery(
                intval($_POST["id"]),
                htmlspecialchars($_POST["title"]),
                htmlspecialchars($_POST["code"]),
                intval($_POST["priority"])
            );
            $delivery->save();
        }
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET["id"];
        if (empty($id)) die("Undefined ID");

        $one = (new Delivery())->getById($id);
        if (empty($one)) die("delivery not found");

        include_once __DIR__ . "/../../views/delivery/form.php";
    }

    public function delete()
    {
        $id = $_GET["id"];
        (new Delivery())->deleteById($id);

        return $this->read();
    }
}