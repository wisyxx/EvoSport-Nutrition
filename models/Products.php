<?php

namespace Model;

use Models\ActiveRecord;

class Products extends ActiveRecord
{
    protected static $table = 'products';
    protected static $DBColumns = ['id', 'name', 'description', 'price', 'image'];

    public $id;
    public $name;
    public $description;
    public $price;
    public $image;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
    }

    
}
