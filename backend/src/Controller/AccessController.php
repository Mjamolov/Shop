<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/News.php";
include_once __DIR__ . "/../../../common/src/Model/Role.php";
include_once __DIR__ . "/../../../common/src/Model/Permission.php";
include_once __DIR__ . "/../../../common/src/Model/Access.php";

class AccessController extends AbstractController
{
    public function read()
    {
        $roles = (new Role())->all();
        $permissions = (new Permission())->all();
        $access = [];

        foreach ((new Access())->all() as $accessItem) {
            $access[$accessItem['role']][$accessItem['permission']] = true;
        }
        include_once __DIR__ . "/../../views/access/list.php";
    }

    public function save()
    {
        if (!empty($_POST)) {
            if ((new Access())->clear()) {
                (new Access())->createAll($_POST['access'] ?? []);
            }
        }
        return $this->read();
    }

    public function update()
    {
        $this->save();
    }

    public function delete()
    {
        $this->save();
    }

    public function create()
    {
        $this->save();
    }
}