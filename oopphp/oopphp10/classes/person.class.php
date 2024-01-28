<?php
class Person {
    // Properties
    public $name;
    public $eye_color;
    public $age;

    /* Methods

    By using type declaration, we can throw an error if wrong type is given!
    Works with:
        - class/interface names
        - self (used to reference to same class)
        - array
        - callable
        - bool
        - float
        - int
        - string
        - iterable
        - object
    */    
    public function set_name(string $new_name) {
        $this->name = $new_name;
    }

    public function get_name() {
        return $this->name;
    }
}