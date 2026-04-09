//1. Basic Function
<?php
function sayHello() {
    echo "Hello Manas!";
}

sayHello();
?>

//2. Function with Parameters
<?php
function greet($name1) {
    echo "Hello " . $name1;
}

greet("Manas");
?>

//3. Function with Return Value
<?php
function add($a, $b) {
    return $a + $b;
}

$result = add(10, 20);
echo $result;
?>

//4. Default Parameters
<?php
function greet1($name = "Guest") {
    echo "Hello " . $name;
}

greet1();         // Guest
greet1("Manas");  // Manas
?>

//5. Type Declaration (PHP 7+)
<?php
function sum(int $a, int $b) {
    return $a + $b;
}

echo sum(5, 10);
?>

//6. Return Type Declaration
<?php
function multiply(int $a, int $b): int {
    return $a * $b;
}

echo multiply(3, 4);
?>

//7. Passing by Reference
<?php
function addFive(&$num) {
    $num += 5;
}

$x = 10;
addFive($x);

echo $x; // 15
?>

//8. Variable Scope
<?php
$x = 10;

function test() {
    global $x;
    echo $x;
}

test();
?>

//9. Static Variable
<?php
function counter() {
    static $count = 0;
    $count++;
    echo $count . "<br>";
}

counter();
counter();
counter();
?>

//10. Anonymous Function (Closure)
<?php
$greet = function($name) {
    return "Hello " . $name;
};

echo $greet("Manas");
?>

//11. Recursive Function
<?php
function factorial($n) {
    if ($n == 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(5); // 120
?>

//12. Arrow Function 
<?php
$add = fn($a, $b) => $a + $b;

echo $add(5, 3);
?>

//Combined Practice Program
<?php
function checkEvenOdd($num) {
    return ($num % 2 == 0) ? "Even" : "Odd";
}

function sumArray($arr) {
    $sum = 0;
    foreach ($arr as $value) {
        $sum += $value;
    }
    return $sum;
}

echo checkEvenOdd(10) . "<br>";

$numbers = [10, 20, 30];
echo "Sum: " . sumArray($numbers);
?>