<?php
require 'classes/users.php';

if (count($_COOKIE) > 0) {
    header("Location:index.php");
}

$firstNameError = $lastNameError = $emailError = $passwordError = "";

if (isset($_POST['btnRegister'])) {
    $users = new Users();

    $firstNameError = $users->ValidateFirstName($_POST['txtFirstName']);
    $lastNameError = $users->ValidateLastName($_POST['txtLastName']);
    $phone_number_error = $users->Validate_phone_number($_POST['txt_phone_number']);
    $passwordError = $users->ValidatePassword($_POST['txtPassword']);

    if ($firstNameError == "") {
        $users->setFirstName($_POST['txtFirstName']);
    }

    if ($lastNameError == "") {
        $users->setLastName($_POST['txtLastName']);
    }

    if ($phone_number_error == "") {
        $users->set_phone_number($_POST['txt_phone_number']);
    }

    if ($passwordError == "") {
        $users->setPass($_POST['txtPassword']);
    }

    if ($firstNameError == "" && $lastNameError == "" && $phone_number_error == "" && $passwordError == "") {
        try {
            $primaryKey = $users->Add();
        } catch (Exception $ex) {
            echo "Error Occurred. Failed to Register";
        }
    }
}
?>

<?php include 'inc/header.php' ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="w-50 mx-auto">
    <div class="input-group mb-3">
        <span class="input-group-text">First Name</span>
        <input type="text" class="form-control<?php echo $firstNameError != "" ? " is-invalid" : "";  ?>" placeholder="First Name" name="txtFirstName" required>
        <div class="invalid-feedback order-1">
            <?php echo $firstNameError; ?>
        </div>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Last Name</span>
        <input type="text" class="form-control<?php echo $lastNameError != "" ? " is-invalid" : "";  ?>" placeholder="Last Name" name="txtLastName" required>
        <div class="invalid-feedback order-1">
            <?php echo $lastNameError; ?>
        </div>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Phone Number</span>
        <input type="number" class="form-control<?php echo $phone_number_error != "" ? " is-invalid" : "";  ?>" placeholder="Phone Number" name="txt_phone_number" required>
        <div class="invalid-feedback order-1">
            <?php echo $phone_number_error; ?>
        </div>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Password</span>
        <input type="password" class="form-control<?php echo $passwordError != "" ? " is-invalid" : "";  ?>" placeholder="Password" name="txtPassword" required>
        <div class="invalid-feedback order-1">
            <?php echo $passwordError; ?>
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" value="Register" name="btnRegister" />
    </div>
</form>

<?php include 'inc/footer.php' ?>