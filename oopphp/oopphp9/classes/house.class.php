<?php

class House {
    public $street_name;
    public $street_nr;

    public function __construct($street_name, $street_nr) {
        $this->street_name = $street_name;
        $this->street_nr = $street_nr;
    }
    public function get_address() {
        return $this->street_name . " " . $this->street_nr;
    }
}