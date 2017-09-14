<?php

return [
    'mysql' => [
        'dbname' => 'codifique',
        'user' => 'root',
        'password' => 'root',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
        'driverOptions' => [
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
        ],
    ],
];