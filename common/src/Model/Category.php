<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class Category
{
    public $id;
    public $title;
    public $groupId;
    public $parentId;

    private $conn;

    public function __construct(
        $id = null,
        $title  = null,
        $groupId = null,
        $parentId = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->parentId = $parentId;
        $this->groupId = $groupId;

    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE categories set
                title='" . $this->title . "', 
                group_id='" . $this->groupId . "',
                parent_id='" . $this->parentId . "'
                where id = " . $this->id . " limit 1";
        } else {
            $query = "INSERT INTO categories VALUES (
                null,
                '" . $this->title . "',
                '" . $this->groupId . "',
                '" . $this->parentId . "',
                46
                )";
        }
        $result = mysqli_query($this->conn, $query);
        print_r(mysqli_error($this->conn));
    }

    public function all()
    {

        $result = mysqli_query($this->conn, "select * from categories order by id desc ");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "select * from categories where id = $id limit 1");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    public function deleteById($id)
    {
        mysqli_query($this->conn, "delete from categories where id = $id limit 1");
    }
}
