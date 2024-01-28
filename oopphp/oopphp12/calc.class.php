<?php
// Scope Resolution Operator (::)

// Here is the first class example!
class FirstClass {
    // Properties
    const EXAMPLE = "You can't change this!";

    // Methods
    public static function test() {
        echo self::EXAMPLE;
    }
}

//$a = FirstClass::test();
//echo $a;













// Here is the second class example!
class SecondClass extends FirstClass {
    // Properties
    public static $static_property = "A static property!";

    // Methods
    public static function another_test() {
        echo parent::EXAMPLE;
        echo self::$static_property;
    }
}

$b = SecondClass::another_test();
echo $b;