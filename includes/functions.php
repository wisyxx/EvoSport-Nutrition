<?php

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
