<?php

    declare(strict_types = 1);
    include "class-autoload.inc.php";

    $oper = $_POST["oper"];
    $num_1 = $_POST["num_1"];
    $num_2 = $_POST["num_2"];

    $calc = new Calc($oper, (int)$num_1, (int)$num_2);

    try {
        echo $calc->calculator();
    } catch (TypeError $e) {
        echo "Error!: " . $e->getMessage();
    }

?>