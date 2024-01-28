<?php
    include "person.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
    $person_1 = new Person("Daniel", "Blue", 28);
    echo $person_1->get_d_a();
    ?>
</body>
</html>