<?php

namespace Models;

class User
{
    protected $table = 'users';
    protected $DBColumns = ['id', 'name', 'surname', 'email', 'password', 'phone'];

    public $id;
    public $name;
    public $surname;
    public $email;
    public $password;
    public $phone;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->surname = $args['surname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->phone = $args['phone'] ?? '';
    }
}