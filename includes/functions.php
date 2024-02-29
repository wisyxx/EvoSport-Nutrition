<?php

use Models\User;

function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}
function s($html)
{
    return htmlspecialchars($html);
}
function createUserReference()
{
    $user = '';
    if (!empty($_SESSION)) {
        $user = User::find($_SESSION['id']);
    }

    return $user;
}