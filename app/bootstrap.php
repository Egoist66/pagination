<?php

$modules = [
    dirname(__DIR__) . '/functions/functions.php',
    dirname(__DIR__) . '/app/model/connect.php',
    dirname(__DIR__) . '/app/model/pagination.php',
];

foreach ($modules as $module) {

    require_once $module;
}

