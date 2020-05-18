<?php

namespace Controller;

use connected\Product;
use connected\ProductDB;
use connected\DBConnection;

class ProductController
{
    public $process;

    public function __construct()
    {
        $connection = new DBConnection();
        $this->process = new ProductDB($connection->connect());
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/addProduct.php';
        } else {

            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $detail = $_POST['detail'];

            $product = new Product($name, $category, $price, $quantity, $detail);
            $this->process->addProduct($product);
            $message = 'Add Completed';
            include 'view/addProduct.php';
        }
    }

    public function viewProduct()
    {
        $products = $this->process->listProduct();
        include 'view/list.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $product = $this->process->get($id);
            include 'view/delete.php';
        } else {
            $id = $_POST['id'];
            $this->process->delete($id);
            header('location: index.php');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $product = $this->process->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $product = new Product($_POST['name'], $_POST['category'], $_POST['price'], $_POST['quantity'], $_POST['detail']);
            $this->process->update($id, $product);
            header('location: index.php');
        }
    }

    public function search(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $keyword = $_REQUEST['key'];
            var_dump($keyword);
            $productSearch = $this->process->search($keyword);
            include "view/search.php";
        }
    }
}