<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Role extends AbstractModel
{
    public $role;

    public function __construct($role = null)
    {
        parent::__construct();

        $this->role = $role;
    }

    public function save()
    {
        $query = "INSERT INTO rbac_role VALUES ('$this->role')";
        $result = mysqli_query($this->conn, $query);
        if(!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function all()
    {
        $roles = [];

        $result = mysqli_query($this->conn, "SELECT * FROM rbac_role");
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $item) {
            $roles[] = $item['role'];
        }
        return $roles;
    }
}