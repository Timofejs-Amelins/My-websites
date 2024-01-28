<?php

if(isset($_POST["submit"]))
{
    // Grabbing the datea
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwd_repeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];


    // Instantiate SignupContr class
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-contr.class.php";
    $signup = new SignupContr($uid, $pwd, $pwd_repeat, $email);

    // Running error handlers and user signup
    $signup->signup_user();

    // Going back to front page
    header("location: ../index.php?error=none");
} 