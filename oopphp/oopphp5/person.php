<?php

class Person {
    // Properties
    private $name;
    private $eye_color;
    private $age;

    public static $drinking_age = 21;

    public function __construct($name, $eye_color, $age) {
        $this->name = $name;
        $this->eye_color = $eye_color;
        $this->age = $age;

    }

    // Methods
    public function set_name($name) {
        $this->name = $name;
    }

    public function get_d_a() {
        return self::$drinking_age;
    }

    public static function set_drinking_age($new_d_a) {
        self::$drinking_age = $new_d_a;
    }
}