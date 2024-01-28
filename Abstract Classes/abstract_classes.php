<?php
// Parent class
abstract class Animal
{
    public $name;

    public abstract function make_sound();
}
// Child classes
class Cat extends Animal
{
    public function make_sound() 
    {
        echo "meow";
    }
}
class Dog extends Animal
{
    public function make_sound() 
    {
        echo "woof";
    }
}

class Pig extends Animal
{
    public function make_sound() 
    {
        echo "oink";
    }
}

// $animal = new Animal();
// $animal->make_sound();
$pig = new Pig();
$pig->make_sound();
