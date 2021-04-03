<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Comments extends AbstractModel
{
    /**
     * @var null | int
     */
    private $id;
    /**
     * @var null | string
     */
    private $productId;
    /**
     * @var null | string
     */
    private $username;
    /**
     * @var null | string
     */
    private $email;
    /**
     * @var null | string
     */
    private $avatar;
    /**
     * @var null | string
     */
    private $comment;

    private $created;

    /**
     * @var false|mysqli
     */

    /**
     * Comments constructor.
     * @param null | number $id
     * @param null | string $productId
     * @param null | string $username
     * @param null | string $email
     * @param null | string $avatar
     * @param null | string $comment
     */
    public function __construct(
        $id = null,
        $productId = null,
        $username = null,
        $email = null,
        $avatar = null,
        $comment = null
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->productId = $productId;
        $this->username = $username;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->comment = $comment;
        $this->created = date('Y-m-d H:i:s', time());
    }

    public function save()
    {
        $query = "INSERT INTO comments VALUES (
                             null,
                             '$this->productId',
                             '$this->username',
                             '$this->email',
                             '$this->avatar',
                             '$this->comment',
                             '$this->created'
                             )";

        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "select * from comments order by id desc");
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (!$result) {
            return mysqli_error($this->conn);
        }
        return $result;
    }

    public function getByProductId($productId)
    {
        $result = mysqli_query($this->conn, "select * from comments");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function deleteById($id)
    {
        mysqli_query($this->conn, "delete from comemnts where id = $id limit 1");
    }

    /**
     * @return int|null
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * @param string|null $productId
     */
    public function setProductId(string $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string|null
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string|null $avatar
     */
    public function setAvatar(string $avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string|null
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return false|mysqli
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param false|mysqli $conn
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
    }
}