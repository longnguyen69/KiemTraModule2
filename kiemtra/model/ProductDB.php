<?php

namespace connected;


class ProductDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    // tham san pham
    public function create($product)
    {
        $sql = "INSERT INTO product(name,price,category,quantity,detail) VALUES (?,?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->category);
        $statement->bindParam(4, $product->quantity);
        $statement->bindParam(5, $product->detail);
        $statement->execute();
    }

    // danh sach san pham
    public function listProduct()
    {
        $sql = "SELECT * FROM product";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];
        foreach ($result as $row) {
            $product = new Product($row['name'], $row['category'], $row['price'], $row['quantity'], $row['detail']);
            $product->id = $row['id'];
            $products[] = $product;
        }
        return $products;
    }

    public function search($keyword)
    {
        $sql = "SELECT * FROM product WHERE `name` LIKE '%$keyword%'";
        $statement = $this->connection->query($sql);
        return $statement->fecthAll();
    }
    // lay thong tin mot san pham
    public function get($id)
    {
        $sql = "SELECT * FROM product WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $product = new Product($row['name'], $row['category'], $row['price'], $row['quantity'], $row['detail']);
        $product->id = $row['id'];
        return $product;
    }

    // sua san pham
    public function update($id, $product)
    {
        $sql = "UPDATE product SET name = ?, category= ?, price = ?, quantity = ?, detail = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->category);
        $statement->bindParam(3, $product->price);
        $statement->bindParam(4, $product->quantity);
        $statement->bindParam(5, $product->detail);
        $statement->bindParam(6, $id);
        return $statement->execute();
    }

    // xoa san pham
    public function delete($id)
    {
        $sql = "DELETE FROM product WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }


}