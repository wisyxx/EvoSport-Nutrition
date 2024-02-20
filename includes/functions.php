<?php

function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function s($html)
{
    return htmlspecialchars($html);
}
