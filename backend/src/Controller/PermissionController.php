<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Permission.php";

class PermissionController extends AbstractController
{
    public function update()
    {
        // TODO: Implement update() method.
    }

    public function read()
    {
        $all = (new Permission())->all();

        include_once __DIR__ . "/../../views/permission/list.php";
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/permission/form.php";
    }

    public function save()
    {
        if (!empty($_POST)) {
            $permission = new Permission(
                htmlspecialchars($_POST["permission"])
            );
            $permission->save();
        }
        return $this->read();
    }

    public function delete()
    {
        $name = htmlspecialchars($_GET["name"]);
        (new Permission())->deleteByName($name);

        return $this->read();
    }

}