<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Shop.php";

class ShopController extends AbstractController
{
    public function create()
    {
        include_once __DIR__ . "/../../views/shop/form.php";
    }

    public function read()
    {
        $all = (new Shop())->all();

        include_once __DIR__ . "/../../views/shop/list.php";
    }


    public function save()
    {
        if (!empty($_POST)) {
            $shop = new Shop(
                intval($_POST["id"]),
                htmlspecialchars($_POST["title"]),
                htmlspecialchars($_POST["address"]),
                htmlspecialchars($_POST["city"])
            );
            $shop->save();
        }
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET["id"];
        if (empty($id)) die("Undefined ID");

        $one = (new Shop())->getById($id);
        if (empty($one)) die("product not found");

        include_once __DIR__ . "/../../views/shop/form.php";
    }

    public function delete()
    {
        $id = $_GET["id"];
        (new Shop())->deleteById($id);

        return $this->read();
    }

}








