<?php

namespace Models;

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

    public function validateProduct()
    {
        if (!$this->name) {
            static::$errors['error'][] = 'You must write a name for the product';
        }
        if (!$this->description) {
            static::$errors['error'][] = 'You must write a description for the product';
        }
        if (!$this->price || !is_numeric($this->price)) {
            static::$errors['error'][] = 'You must write a valid price';
        }

        return static::$errors;
    }
}
