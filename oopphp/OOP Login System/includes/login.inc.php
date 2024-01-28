<?php

if(isset($_POST["submit"]))
{
    // Grabbing the datea
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];


    // Instantiate SignupContr class
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";
    $login = new LoginContr($uid, $pwd);

    // Running error handlers and user signup
    $login->login_user();

    // Going back to front page
    header("location: ../index.php?error=none");
} 