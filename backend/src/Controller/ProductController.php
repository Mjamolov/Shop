<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/FileUploader.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
//include_once __DIR__ . "/../../../common/src/Service/ValidationService.php";
//include_once __DIR__ . "/../../../common/src/Service/MessageService.php";
//include_once __DIR__ . "/../../../common/src/Service/ProductValidator.php";

class ProductController extends AbstractController
{

    public function read()
    {
        $all = (new Product())->all();

        include_once __DIR__ . "/../../views/product/list.php";
    }

    public function save()
    {
        if (!empty($_POST)) {
            $fileName = FileUploader::upload("products");
            $now = date("Y-m-d H:i:s", time());

            $_POST['picture'] = $fileName;

            if (!ProductValidator::validate()) {
                if (isset($_POST['id']))
                    return $this->update($_POST['id']);
                return $this->create();
            }

            $product = new Product(
                intval($_POST["id"]),
                htmlspecialchars($_POST["title"]),
                htmlspecialchars($fileName ?? ''),
                htmlspecialchars($_POST["preview"]),
                htmlspecialchars($_POST["content"]),
                intval($_POST["price"]),
                intval($_POST["status"]),
                $now,
                $now
            );
            $product->save();
        }
        return $this->read();
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/product/form.php";
    }

    public function delete()
    {
        $id = (int)$_GET["id"];

        (new Product())->deleteById($id);
        return $this->read();
    }

    public function update($id = null)
    {
        $id = !empty($id) ? $id : (int)$_GET["id"];
        if (empty($id)) die("Undefined ID");

        $one = (new Product())->getById($id);
        if (empty($one)) die("product not found");

        include_once __DIR__ . "/../../views/product/form.php";

    }

}








