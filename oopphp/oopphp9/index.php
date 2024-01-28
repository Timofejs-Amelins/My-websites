<?php  
    include "includes/autoloader.inc.php"

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
        $person_1 = new Person\Person("Daniel", 28);
        echo $person_1->get_person();

        echo "<br>";

        $house_1 = new House("Johndoeroad", 12);
        echo $house_1->get_address();
    ?>
</body>
</html>    