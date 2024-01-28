<?php
    // ensure user is logged in and delete blog
    if (count($_COOKIE) > 0) {
        header("Location: login.php");
    }
    require "config/database.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM blogs WHERE blog_id = $id";
    mysqli_query($conn, $sql);
    header("Location: blogs.php")
?>    
