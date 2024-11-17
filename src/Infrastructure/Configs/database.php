<?php

use Src\Application\Helpers\Helpers;

return [
    'connection' => Helpers::env('DB_CONNECTION', 'mysql'),
    'port' => Helpers::env('DB_PORT', 3306),
    'host' => Helpers::env('DB_HOST', 'localhost'),
    'database' => Helpers::env('DB_DATABASE', 'db_name'),
    'username' => Helpers::env('DB_USERNAME', 'root'),
    'password' => Helpers::env('DB_PASSWORD', ''),
];
