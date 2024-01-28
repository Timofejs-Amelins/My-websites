<?php
    //declare(strict_types = 1);
    include "includes/class-autoload.inc.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">

    <title></title>
</head>
<body>
    <?php
    $person_1 = new Person();

    try {
        $person_1->set_name(2);
        echo $person_1->get_name();
    } catch (TypeError $e) {
        echo "Error! " . $e->getMessage();
    }
    ?>
</body>
</html>