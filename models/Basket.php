<?php

namespace Models;

class Basket extends ActiveRecord
{
    protected static $table = 'usersproducts';
    protected static $DBColumns = ['id', 'productId', 'name', 'price', 'image'];

    public $id;
    public $productId;
    public $name;
    public $price;
    public $image;

    public function __construct($args = [])
    {
        $this->productId = $args['productId'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
    }
}