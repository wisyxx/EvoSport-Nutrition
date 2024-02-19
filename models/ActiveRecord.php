<?php

namespace Models;

class ActiveRecord
{
    protected static $db;
    protected static $table = '';
    protected static $DBColumns = [];
    protected static $errors = [];

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public static function getAlerts()
    {
        return static::$errors;
    }
    public static function setAlert($type, $message)
    {
        static::$errors[$type][] = $message;
    }

    public static function where($column, $value)
    {
        $query = "SELECT * FROM " . static::$table  . " WHERE $column = '$value'";
        $result = self::queryDB($query);
        return array_shift($result);
    }
    public static function get($limit)
    {
        $query = "SELECT * FROM ";
        $query .= static::$table;
        $query .= " LIMIT $limit";

        $result = static::queryDB($query);

        return $result;
    }
    public static function all()
    {
        $query = "SELECT * FROM ";
        $query .= static::$table;

        $result = static::queryDB($query);

        return $result;
    }
    public static function find($id)
    {
        $query = "SELECT * FROM ";
        $query .= static::$table;
        $query .= " WHERE id = ";
        $query .= $id;
        $result = static::queryDB($query);

        return array_shift($result);
    }
    protected static function createObject($record)
    {
        $obj = new static;

        foreach ($record as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->$key = $value;
            }
        }

        return $obj;
    }
    public static function queryDB($query)
    {
        $result = self::$db->query($query);

        $array = [];
        while ($record = $result->fetch_assoc()) {
            $array[] = static::createObject($record);
        }

        $result->free();

        return $array;
    }
}
