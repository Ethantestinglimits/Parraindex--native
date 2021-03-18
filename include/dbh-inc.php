<?php

define('server','localhost');
define('database','root');

//Connection DB SQLite pour le Login system
$conn = new PDO("sqlite:" . "../databases/database.db");

if (!$conn) {
    die("Connection failed" . sqlite_error_string());
}