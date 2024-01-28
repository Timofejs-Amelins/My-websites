<?php
// Regular class

include_once "classes/simpleclass.class.php";

$obj = new SimpleClass();
$obj->hello_world();

// Anonymous class

$new_obj = new class() {   
    public function hello_world() {
        echo "Hello World!";
    }
};

$new_obj->hello_world();