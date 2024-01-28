<?php
// Interfaces

interface PaymentInterface {
    public function pay_now();
}
interface LoginInterface {
    public function pay_now();
    public function pay_now();
    public function pay_now();
    public function login_first();
}

class Paypal implements PaymentInterface, LoginInterface {
    public function login_first() {

    }
    public function pay_now() {
        
    }
    public function payment_process() {
        $this->login_first();
        $this->pay_now();
    }
}

class BankTransfer implements PaymentInterface, LoginInterface {
    public function login_first() {

    }
    public function pay_now() {
        
    }
    public function payment_process() {
        $this->login_first();
        $this->pay_now();
    }
}

class Visa implements PaymentInterface {
    public function pay_now() {

    }
    public function payment_process() {
        $this->pay_now();
    }
}

class Cash implements PaymentInterface {
    public function pay_now() {

    }
    public function payment_process() {
        $this->pay_now();
    }
}

class BuyProduct {
    public function pay(PaymentInterface $payment_type) {
        $payment_type->payment_process();         
    }

    public function online_pay(LoginInterface $payment_type) {
        $payment_type payment_process();
    }
}

$payment_type = new Cash();
$buy_product = new BuyProduct();
$buy_product->pay($payment_type);