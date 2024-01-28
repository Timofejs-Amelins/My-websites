<?php

abstract class Visa {
    public function visa_payment() {
        return "Perform a payment";
    }

    abstract public function get_payment();   
}