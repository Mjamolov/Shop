<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/../Model/Product.php";
include_once __DIR__ . "/AbstractModel.php";

class Order extends AbstractModel
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int | null
     */
    private $userId;

    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $paymentId;

    /**
     * @var int
     */
    private $deliveryId;

    /**
     * @var int
     */
    private $status;

    /**
     * @var datetime
     */
    private $created;

    /**
     * @var datetime
     */
    private $updated;

    /**
     * @var string | null
     */
    private $comment;

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
     * Order constructor.
     * @param int | null $id
     * @param int | null $userId
     * @param int $paymentId
     * @param int $deliveryId
     * @param int $status
     * @param string | null $comment
     * @param int $updated
     * @param int $total
     * @param string $name
     * @param string $phone
     * @param string $email
     */
    public function __construct(
        $id = null,
        $userId = null,
        $paymentId = null,
        $deliveryId = null,
        $total = null,
        $comment = null,
        $name = null,
        $phone = null,
        $email = null,
        $status = null,
        $updated = null
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->userId = $userId;
        $this->paymentId = $paymentId;
        $this->deliveryId = $deliveryId;
        $this->total = $total;
        $this->comment = $comment;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->status = $status;

        if ($this->id == null) {
            $this->created = date('Y-m-d H:i:s', time());
        }
        $this->updated = $updated ?? date('Y-m-d H:i:s', time());
    }

    /**
     * @return string | null
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string | null $comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return int | null
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int | null $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total)
    {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getPaymentId(): int
    {
        return $this->paymentId;
    }

    /**
     * @param int $paymentId
     */
    public function setPaymentId(int $paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return int
     */
    public function getDeliveryId(): int
    {
        return $this->deliveryId;
    }

    /**
     * @param int $deliveryId
     */
    public function setDeliveryId(int $deliveryId)
    {
        $this->deliveryId = $deliveryId;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return datetime
     */
    public function getCreated(): datetime
    {
        return $this->created;
    }

    /**
     * @param datetime $created
     */
    public function setCreated(datetime $created)
    {
        $this->created = $created;
    }

    /**
     * @return datetime
     */
    public function getUpdated(): datetime
    {
        return $this->updated;
    }

    /**
     * @param datetime $updated
     */
    public function setUpdated(datetime $updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return mixed|null
     */
    public function save()
    {
        try {
            $query = "INSERT INTO orders (
                    id,
                    user_id,
                    status,
                    created,
                    updated,
                    delivery_id,
                    payment_id,
                    total,
                    comment,
                    phone,
                    email,
                    name
                    ) VALUES (
                   null,
                   '$this->userId',
                   '$this->status',
                   '$this->created',
                   '$this->updated',
                   '$this->deliveryId',
                   '$this->paymentId',
                   '$this->total',
                   '$this->comment',
                   '$this->phone',
                   '$this->email',
                   '$this->name'
                       )";

            $result = mysqli_query($this->conn, $query);
            if (!$result) {
                throw new Exception(mysqli_error($this->conn));
            }
            $result = mysqli_query($this->conn, "SELECT LAST_INSERT_ID() as last_id");
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return reset($result)['last_id'] ?? null;
        } catch (Exception $exception) {
            ExceptionService::error($exception, "frontend");
        }
    }

    /**
     * @return mixed|null
     */
    public function update()
    {
        try {
            $query = "UPDATE orders SET
                delivery_id = '$this->deliveryId',
                payment_id = '$this->paymentId',
                name = '$this->name',
                phone = '$this->phone',
                email = '$this->email',
                updated = '$this->updated',
                status = '$this->status'
             WHERE id = '$this->id' limit 1";

            $result = mysqli_query($this->conn, $query);
            if (!$result) {
                throw new Exception(mysqli_error($this->conn));
            }
            return true;
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
        $result = mysqli_query($this->conn, "select * from orders where id = '$id' limit 1");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    /**
     * @return array<Order>
     */
    public function getFromDB()
    {
        $result = mysqli_query($this->conn, "select * from orders where user_id = $this->userId limit 1");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    /**
     * @return array<Order>
     */
    public function all()
    {
        $result = mysqli_query($this->conn, "select * from orders");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getProductsAndQuantityByOrderId($orderId)
    {
        $products = [];
        $result = mysqli_query($this->conn, "select order_item.quantity, products.* from order_item left join products on order_item.product_id = products.id where order_id = " . $orderId);
        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $products[] = [
                'quantity' => $item['quantity'],
                'product' => new Product(
                    $item['id'],
                    $item['title'],
                    $item['picture'],
                    $item['preview'],
                    $item['content'],
                    $item['price'],
                    $item['status'],
                    $item['created'],
                    $item['updated']
                ),
            ];
        }
        return $products;
    }

    /**
     * @return mysqli
     */
    public function getConn(): mysqli
    {
        return $this->conn;
    }

    /**
     * @param mysqli $conn
     */
    public function setConn(mysqli $conn)
    {
        $this->conn = $conn;

        return $this;
    }

}


