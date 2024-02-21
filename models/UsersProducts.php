<?php

namespace Models;

use Models\ActiveRecord;

class UsersProducts extends ActiveRecord
{
    protected static $table = 'usersproducts';
    protected static $DBColumns = ['id', 'userId', 'productId'];

    public $id;
    public $userId;
    public $productId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->userId = $args['userId'] ?? '';
        $this->productId = $args['productId'] ?? '';
    }
}