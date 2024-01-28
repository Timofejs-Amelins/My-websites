<?php
require 'classes/users.php';

if (count($_COOKIE) > 0) {
    header("Location: index.php");
}

$error = "";

if (isset($_POST['btnLogin'])) {
    $phone_number = $_POST['txt_phone_number'];

    $pass = $_POST['txtPassword'];

    $users = new Users();

    $data = $users->CheckLogin($phone_number, $pass);


    if ($data == null) {
        $error = "Login Not Found Try Again";
    } else {
        setcookie('phone_number', $phone_number, time() + (86400 * 30), "/"); // 86400 = 1 day

        setcookie('is_logged_in', true, time() + (86400 * 30), "/"); // 86400 = 1 day

        header("Location:index.php");
    }
}

?>

<?php include 'inc/header.php' ?>

<?php if ($error != "") { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php } ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Phone Number</span>
        <input type="number" class="form-control" placeholder="Phone Number" aria-label="email" aria-describedby="basic-addon1" name="txt_phone_number" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="txtPassword" required>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" value="Login" name="btnLogin" />
    </div>
</form>

<?php include 'inc/footer.php' ?>