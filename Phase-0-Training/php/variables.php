<?php
echo "Hello World!";
?>

// Variables in PHP
<?php
$name = "Manas";
$age = 22;

echo $name;
echo "<br>";
echo $age;
?>

<?php
$x = 10;
$y = 20;

$sum = $x + $y;
echo "Sum: " . $sum;
?>

//Data Types in PHP
// String
<?php
$name = "Manas";
echo $name;
?>

//Integer
<?php
$age = 25;
echo $age;
?>

// Float (Decimal)
<?php
$price = 99.99;
echo $price;
?>

// Boolean
<?php
$isLoggedIn = true;

var_dump($isLoggedIn);
?>

// Array
<?php
$colors = array("Red", "Green", "Blue");

print_r($colors);
?>

// Object
<?php
class Car {
    public $brand;

    function setBrand($brand) {
        $this->brand = $brand;
    }
}

$car = new Car();
$car->setBrand("BMW");

echo $car->brand;
?>

// NULL
<?php
$x = null;
var_dump($x);
?>

// var_dump() 
<?php
$x = 100;
$y = "Hello";
$z = 10.5;

var_dump($x);
var_dump($y);
var_dump($z);
?>

// Type Checking
<?php
$x = "Hello";

echo gettype($x);  // Output: string
?>


// Type Casting
<?php
$x = "100";

$intValue = (int)$x;

echo $intValue;
?>

// Constants
<?php
define("SITE_NAME", "MyWebsite");

echo SITE_NAME;
?>

// Combined Practice Program
<?php
$name = "Manas";
$age = 22;
$price = 199.99;
$isStudent = true;

echo "Name: " . $name . "<br>";
echo "Age: " . $age . "<br>";
echo "Price: " . $price . "<br>";

var_dump($isStudent);
?>