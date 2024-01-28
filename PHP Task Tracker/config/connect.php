<?php
// define constants for database connection
require "config.php";

// create database connection
define("DSN", "mysql:host=$HOST;dbname=$DB;charset=UTF8");

// attempt to connect to database
try {

    // PDO will print any exceptions raised
    define("OPTIONS", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    return new PDO($DSN, $USER, $PASSWORD, $OPTIONS);
} catch (PDOException $e) {
    echo $e->getMessage();
}
