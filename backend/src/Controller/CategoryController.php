<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Category.php";

class CategoryController extends AbstractController
{  
    public function read()
    {
        $all = (new Category())->all();

        include_once __DIR__ . "/../../views/category/list.php";
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/category/form.php";
    }

    public function update()
    {
        $id = (int)$_GET["id"];
        if (empty($id)) die('Undefined ID');

        $oneCategory = (new Category())->getById($id);
        if (empty($oneCategory)) die('Product not found');

        include_once __DIR__ . "/../../views/category/form.php";
    }

    public function delete()
    {
        $id = (int)$_GET["id"];
        (new Category())->deleteById($id);
        return $this->read();
    }

    public function save()
    {
        if (!empty($_POST)) {
//            $now = date("Y-m-d H:i:s", time());

            $product = new Category(
                intval($_POST["id"]),
                htmlspecialchars($_POST["title"]),
                htmlspecialchars($_POST["group_id"]),
                htmlspecialchars($_POST["parent_id"])
//                $now
            );
            $product->save();
        }
        return $this->read();
    }
}