<?php

spl_autoload_register("my_auto_loader");

function my_auto_loader($class_name) {
    $path = "classes/";
    $extension = ".class.php";
    $file_name = $path . $class_name . $extension;

    if (!file_exists($file_name)) {
        return false;
    }

    include_once $path . $class_name . $extension;
}