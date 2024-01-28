<?php
$message;
?>
<!--display login form-->
<form action="includes/login.inc.php" method="post">

    <!--member id field-->
    <label for="member_id">
        Enter your Member ID
    </label>
    <!--input tags are text by default-->
    <input name="member_id">
    <?php
    ?>
    <!--submission button-->
    <input type="submit" value="Enter">
</form>