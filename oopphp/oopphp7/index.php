<?php
    include "newclass.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <?php
        $object = new NewClass();
        unset($object);
        echo $object->get_property();
    ?> 
</body>
</html>
