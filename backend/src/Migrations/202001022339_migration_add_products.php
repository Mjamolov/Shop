<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddProducts {

    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => 'Product1',
            'picture' => '01.jpg',
            'preview' => 'MacBook Pro — наш самый мощный ноутбук с высокопроизводительными процессорами, панелью Touch Bar и превосходным дисплеем Retina.',
            'content' => 'Дисплей: 15.6" IPS 1920x1080 FHD; Процессор: Intel Core i5-9300H 2.40 ГГц; Видеокарта: nVidia GeForce GTX 1650 4 Гб; Оперативная память: 8 Гб DDR4; Накопитель: SSD 512 Гб; Операционная система: DOS',
            'price' => '321',
            'status' => '123',
            'created' => '2021-01-23 17:34:33',
            'updated' => '2021-01-24 12:32:33'
        ],
        [
            'id' => 'null',
            'title' => 'Product2',
            'picture' => '02.jpg',
            'preview' => 'MacBook Pro — наш самый мощный ноутбук с высокопроизводительными процессорами, панелью Touch Bar и превосходным дисплеем Retina.',
            'content' => 'Дисплей: 15.6" IPS 1920x1080 FHD; Процессор: Intel Core i5-9300H 2.40 ГГц; Видеокарта: nVidia GeForce GTX 1650 4 Гб; Оперативная память: 8 Гб DDR4; Накопитель: SSD 512 Гб; Операционная система: DOS',
            'price' => '321',
            'status' => '123',
            'created' => '2021-01-23 17:34:33',
            'updated' => '2021-01-24 12:32:33'
        ],
        [
            'id' => 'null',
            'title' => 'Product3',
            'picture' => '03.jpg',
            'preview' => 'MacBook Pro — наш самый мощный ноутбук с высокопроизводительными процессорами, панелью Touch Bar и превосходным дисплеем Retina.',
            'content' => 'Дисплей: 15.6" IPS 1920x1080 FHD; Процессор: Intel Core i5-9300H 2.40 ГГц; Видеокарта: nVidia GeForce GTX 1650 4 Гб; Оперативная память: 8 Гб DDR4; Накопитель: SSD 512 Гб; Операционная система: DOS',
            'price' => '321',
            'status' => '123',
            'created' => '2021-01-23 17:34:33',
            'updated' => '2021-01-24 12:32:33'
        ],
        [
            'id' => 'null',
            'title' => 'Product4',
            'picture' => '04.jpg',
            'preview' => 'MacBook Pro — наш самый мощный ноутбук с высокопроизводительными процессорами, панелью Touch Bar и превосходным дисплеем Retina.',
            'content' => 'Дисплей: 15.6" IPS 1920x1080 FHD; Процессор: Intel Core i5-9300H 2.40 ГГц; Видеокарта: nVidia GeForce GTX 1650 4 Гб; Оперативная память: 8 Гб DDR4; Накопитель: SSD 512 Гб; Операционная система: DOS',
            'price' => '321',
            'status' => '123',
            'created' => '2021-01-23 17:34:33',
            'updated' => '2021-01-24 12:32:33'
        ],
        [
            'id' => 'null',
            'title' => 'Product5',
            'picture' => '05.jpg',
            'preview' => 'MacBook Pro — наш самый мощный ноутбук с высокопроизводительными процессорами, панелью Touch Bar и превосходным дисплеем Retina.',
            'content' => 'Дисплей: 15.6" IPS 1920x1080 FHD; Процессор: Intel Core i5-9300H 2.40 ГГц; Видеокарта: nVidia GeForce GTX 1650 4 Гб; Оперативная память: 8 Гб DDR4; Накопитель: SSD 512 Гб; Операционная система: DOS',
            'price' => '321',
            'status' => '123',
            'created' => '2021-01-23 17:34:33',
            'updated' => '2021-01-24 12:32:33'
        ],
    ];

    public  function  __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function  commit()
    {
        foreach ($this->data as $product)
        {

            $result = mysqli_query($this->conn, "INSERT INTO products VALUE(
            " . $product['id'] . ",
            '" . $product['title'] . "', 
            '" . $product['picture'] . "',
            '" . $product['preview'] . "',
            '" . $product['content'] . "', 
            '" . $product['price'] . "',   
            '" . $product['status'] . "', 
            '" . $product['created'] . "', 
            '" . $product['updated'] . "'
        )");

            if (!$result) {
                echo mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn,"TRUNCATE TABLE products");

        if (!$result) {
            echo mysqli_error($this->conn) . PHP_EOL;
        }
    }
}


















