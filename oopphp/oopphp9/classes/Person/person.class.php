<?php

namespace Person;

class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function get_person() {
        return $this->name . " is " . $this->age . " years old!";
    }

}