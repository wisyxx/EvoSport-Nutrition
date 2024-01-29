<?php

namespace Models;

class ActiveRecord
{
    protected static $db;
    protected static $table = '';
    protected static $DBColumns = [];

    public static function setDB($database)
    {
        self::$db = $database;
    }

    
}
