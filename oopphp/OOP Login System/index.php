<?php
    session_start();
?>

<form action="includes/signup.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="password" name="pwdrepeat" placeholder="Repeat Password">
    <input type="text" name="email" placeholder="E-mail">
    <br>
    <button type="submit" name="submit">SIGN UP</button>
</form>

<form action="includes/login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <br>
    <button type="submit" name="submit">LOGIN</button>
</form>