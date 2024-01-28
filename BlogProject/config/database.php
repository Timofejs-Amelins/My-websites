<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "blogproject.db");
    
    $conn;
    // try connecting to the database
    try {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    catch (Exception $ex) {
        echo "Connection failed" .$ex;
    }
?>