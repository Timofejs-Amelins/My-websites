<?php
// Parent class
class Car
{
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function intro() : string
    {
        return "I am a Car! I'm an $this->name!";
    }
}

// Child classes
class Audi extends Car
{
    public function intro() : string{
        return "Choose German quality! I'm an $this->name!";
    }
}

class Volvo extends Car
{
    public function intro() : string
    {
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

class Citoren extends Car
{
    public function intro() : string
    {
        return "French extravagance! I'm a $this->name!";
    }
}

// Create object from the parent classes
$car = new Car("Honda");
echo $car->intro();
echo "<br>";

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citoren = new citoren("Citoren");
echo $citoren->intro();