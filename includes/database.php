<?php

$db = mysqli_connect('localhost', 'root', '177068', 'evosport_mvc', '3306');

if (!$db) {
    echo "Error: Couldn't connect to MySQL.";
    echo "Error code: " . mysqli_connect_errno();
    echo "Description: " . mysqli_connect_error();
    exit;
}