<?php

class Calc {
    public $operator;
    public $num_1;
    public $num_2;

    public function __construct(string $one, int $two, int $three) {
        $this->operator = $one;
        $this->num_1 = $two;
        $this->num_2 = $three;
    }

    public function calculator() {
        switch($this->operator) {
            case "add":
                $result = $this->num_1 + $this->num_2;
                return $result;
                break;
            case "sub":
                $result = $this->num_1 - $this->num_2;
                return $result;
                break;
            case "div":
                $result = $this->num_1 / $this->num_2;
                return $result;
                break;
            case "mul":
                $result = $this->num_1 * $this->num_2;
                return $result;
                break;
            default:
                echo "Error!";
                break;
        }
    }
}