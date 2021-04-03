<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/../Service/UserService.php";
include_once __DIR__ . "/AbstractModel.php";

class User extends AbstractModel
{

    const ROLE_USER_VALUE = 'ROLE_USER';

    /**
     * @var int | null
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $phone;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var array
     */
    private $roles;

    public function __construct(
        $id = null,
        $name = null,
        $phone = null,
        $email = null,
        $password = null,
        $roles = []
    )
    {
        parent::__construct();

        $id && $this->setId($id);
        $name && $this->setName($name);
        $phone && $this->setPhone($phone);
        $email && $this->setemail($email);
        $password && $this->setPassword($password);
        $roles && $this->setRoles($roles);

    }

    /**
     * @return mixed|null
     */
    public function save()
    {
        try {
            if ($this->id > 0) {
                $query = "UPDATE `user` set 
                    `name` = '" . $this->getName() . "',
                    `phone` = '" . $this->getPhone() . "',
                    `email` = '" . $this->getEmail() . "',
                    `password` = '" . $this->getPassword() . "',
                    `roles` = '" . json_encode($this->getRoles()) . "'
                    WHERE id = '$this->getId()' limit 1";
                $result = mysqli_query($this->conn, $query);
                if (!$result) {
                    throw new Exception(mysqli_error($this->conn), 400);
                }
            } else {
                $query = "INSERT INTO `user` (
                    id,
                    name,
                    phone,
                    email,
                    password,
                    roles
                    ) VALUES (
                   null,
                    '" . $this->getName() . "',
                    '" . $this->getPhone() . "',
                    '" . $this->getEmail() . "',
                    '" . $this->getPassword() . "',
                    '" . json_encode($this->getRoles()) . "'
                       )";
                $result = mysqli_query($this->conn, $query);
                if (!$result) throw new Exception(mysqli_error($this->conn), 400);
            }
        } catch (Exception $exception) {
            ExceptionService::error($exception, "frontend");
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $result = mysqli_query($this->conn, "select * from user where id = '$id' limit 1");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        $result = mysqli_query($this->conn, "select * from user where email = '$email' limit 1");

        if (!$result) {
            throw new Exception("User not found", 404);
        }

        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    /**
     * @param array $roles
     * @param $controller
     * @param $action
     * @return bool
     * @throws Exception
     */
    public function isAccess(array $roles, $controller, $action)
    {
        $permission = SecurityService::getPermissionNameByControllerAndAction($controller, $action);
        $result = mysqli_query($this->conn, "select * from `rbac_access`
            where role in  ('" . implode("','", $roles) . "') and permission = '$permission'");

        if (!$result) {
            throw new Exception("Permission error", 400);
        }

        $accesses = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r("select * from `rbac_access`
            where role in  ('" . implode("','", $roles) . "') and permission = '$permission'");
        foreach ($accesses as $access) {
            if($access) return true;
        }
        throw new Exception('No Permission', 403);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id | null
     */
    public function setId( $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName( $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone( $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail( $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword( $password)
    {
        $this->password = UserService::encodePassword($password);
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles( $roles)
    {
        $this->roles = $roles;
    }

}







