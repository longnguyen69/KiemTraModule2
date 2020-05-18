<?php

namespace connected;


class Product
{
    public $id;
    public $name;
    public $category;
    public $price;
    public $quantity;
    public $detail;

    public function __construct($name, $category, $price, $quantity, $detail)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->detail = $detail;
    }

}