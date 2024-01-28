<?php include 'inc/header.php' ?>

    <?php
    if (!(isset($_COOKIE["phone_number"]) && isset($_COOKIE["is_logged_in"]))) {
        header("Location: login.php");
    } else {
        echo "Welcome to Task Tracker";
    }
    ?>

<?php include 'inc/footer.php' ?>