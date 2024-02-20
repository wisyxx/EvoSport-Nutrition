<?php

namespace Models;

class User extends ActiveRecord
{
    protected static $table = 'users';
    protected static $DBColumns = ['id', 'name', 'surname', 'email', 'password', 'phone'];

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

    public function validateLogin()
    {
        if (!$this->email) {
            static::$errors['error'][] = 'You must write an email!';
        }
        if (!$this->password || strlen($this->password) < 8) {
            static::$errors['error'][] = 'Invalid password, it must have at least 8 characters';
        }

        return static::$errors;
    }
    public function validateRegistration()
    {
        if (!$this->password || strlen($this->password) < 8) {
            static::$errors['error'][] = 'Your password must have at least 8 characters';
        }
        if (!$this->name) {
            static::$errors['error'][] = 'You must write your name';
        }
        if (!$this->surname) {
            static::$errors['error'][] = 'You must write your surname';
        }
        if (!$this->phone) {
            static::$errors['error'][] = 'You must write your phone number';
        }
        if (!$this->email) {
            static::$errors['error'][] = 'You must write your email';
        }
    }

    public function validatePassword($password)
    {
        $result = password_verify($this->password, $password);
        if ($result) {
            return true;
        } else {
            self::$errors['error'][] = 'Incorrect password';
        }
    }
}
