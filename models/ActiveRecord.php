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

    /*======> IMAGES <======*/
    public function deleteImage()
    {
        if ($this->profileImage) {
            unlink('build/img/users/' . $this->profileImage);
        } else {
            return;
        }
    }

    /*======> ALERTS <======*/
    public static function getAlerts()
    {
        return static::$errors;
    }
    public static function setAlert($type, $message)
    {
        static::$errors[$type][] = $message;
    }

    /*======> DB INTERACTION <======*/
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
    public function save()
    {
        $result = '';

        if (!is_null($this->id)) {
            $result = $this->update();
        } else {
            $result = $this->create();
        }
        return $result;
    }
    public function create()
    {
        $atributes = $this->sanitizeAtributes();

        $query = "INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($atributes));
        $query .= " ) VALUES ( '";
        $query .= join("', '", array_values($atributes));
        $query .= "')";

        $result = self::$db->query($query);

        return [
            'result' =>  $result,
            'id' => self::$db->insert_id
        ];
    }
    public function update()
    {
        $atributes = $this->sanitizeAtributes();

        $values = [];
        foreach ($atributes as $key => $value) {
            $values[] = "$key='$value'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(' ,', $values);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $result = self::$db->query($query);
        return $result;
    }
    public static function SQL($query)
    {
        $result = self::queryDB($query);

        return $result;
    }
    public static function delete($id)
    {
        $query = "DELETE FROM " . static::$table;
        $query .= " WHERE id = " . $id;
        $result = self::$db->query($query);

        return $result;
    }
    /*======> MODEL INTERACTION <======*/
    public function atributes()
    {
        $atributes = [];
        foreach (static::$DBColumns as $column) {
            if ($column === 'id') continue;
            $atributes[$column] = $this->$column;
        }
        return $atributes;
    }
    public function sanitizeAtributes()
    {
        $atributes = $this->atributes();
        $sanitized = [];
        foreach ($atributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
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
    public function sync($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
