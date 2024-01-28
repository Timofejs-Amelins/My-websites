<?php

setcookie('is_logged_in', $_COOKIE["is_logged_in"], time() - 3600);
setcookie('phone_number', $_COOKIE["phone_number"], time() - 3600);

header("Location: login.php");
