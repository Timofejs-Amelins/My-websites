<?php
class NewClass {
    public $data = "I am a property";
    public function __construct() {
        echo "This class has been instantiated <br>";
    }

    public function set_new_property($newdata) {
        $this->data = $newdata;

    }
    public function get_property() {
        return $this->data;
    }
    public function __destruct() {
        echo "<br> This is the end of the class!";
    }
}