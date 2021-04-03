<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class Shop
{
    public $id;
    public $title;
    public $address;
    public $city;

    private $conn;

    public function __construct(
        $id = null,
        $title = null,
        $address = null,
        $city = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->address = $address;
        $this->city = $city;
    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE shops set 
                    title='$this->title',
                    address='$this->address',
                    city='$this->city'
                    where id = $this->id limit 1";
        } else {
            $query = "INSERT INTO shops VALUES (
                             null,
                             '$this->title',
                             '$this->address',
                             '$this->city'
                             )";
        }
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM shops ORDER BY id DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM shops WHERE id=$id LIMIT 1");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    public function deleteById($id)
    {
        $result = mysqli_query($this->conn, "DELETE FROM shops WHERE id=$id LIMIT 1");
    }
}