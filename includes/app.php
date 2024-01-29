<?php

use Models\ActiveRecord;

require 'functions.php';
require 'database.php';
require __DIR__ . '/../vendor/autoload.php';

$db = ActiveRecord::setDB($db);
