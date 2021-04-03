<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Payment extends AbstractModel
{
    private $id;
    private $title;
    private $code;
    private $priority;

    public function __construct(
        $id = null,
        $title = null,
        $code = null,
        $priority = null
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->title = $title;
        $this->code = $code;
        $this->priority = $priority;
    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE payment set 
                    title='$this->title',
                    code='$this->code',
                    priority='$this->priority'
                    where id = $this->id limit 1";
        } else {
            $query = "INSERT INTO payment VALUES (
                             null,
                             '$this->title',
                             '$this->code',
                             '$this->priority'
                             )";
        }
        mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM payment ORDER BY id DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM payment WHERE id=$id LIMIT 1");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    public function deleteById($id)
    {
        $result = mysqli_query($this->conn, "DELETE FROM payment WHERE id=$id LIMIT 1");
    }

    /**
     * @return null | int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null | int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null | string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null | string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null | string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param null | string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return null | int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param null | int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }
}