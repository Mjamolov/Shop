<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Permission extends AbstractModel
{
    public $permission;

    public function __construct($permission = null)
    {
        parent::__construct();

        $this->permission = $permission;
    }

    public function deleteByName($name)
    {
        $query = "DELETE FROM rbac_permission where permission = '$name'";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function save()
    {
        $query = "INSERT INTO rbac_permission VALUES ('$this->permission')";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function all()
    {
        $permission = [];

        $result = mysqli_query($this->conn, "SELECT * FROM rbac_permission ORDER BY permission DESC");
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $item) {
            $permission[] = $item['permission'];
        }
        return $permission;
    }
}