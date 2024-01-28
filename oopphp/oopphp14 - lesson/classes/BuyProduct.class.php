<?php

class BuyProduct extends Visa {
    public function get_payment() {
        return $this->visa_payment();
    }

    
}