<?php

// kettle attributes and data types
class Kettle {
    private $colour;
    private $temperature;
    private $water_level;
    private $is_switched_on;

    // set kettle attributes
    function __construct($colour) {
        $this->colour = $colour;
        $this->set_temperature(20);
        $this->set_water_level(0);
        $this->set_is_switched_on(false);
    }

    // get the kettle colour
    private function get_colour() {
        return $this->colour;
    }

    // get the current temperature
    private function get_temperature() {
        return $this->temperature;
    }

    // get the current water level
    private function get_water_level() {
        return $this->water_level;
    }

    // set the water level
    private function set_water_level($water_level) {
        $this->water_level = $water_level;
    }

    // get the current power status
    private function get_water_level() {
        return $this->water_level;
    }

    // turn the 
    private function set_water_level($water_level) {
        $this->water_level = $water_level;
    }
}