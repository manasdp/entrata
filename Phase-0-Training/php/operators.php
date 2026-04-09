//Arithmetic Operators
<?php
$a = 10;
$b = 5;

echo $a + $b; // 15
echo "<br>";

echo $a - $b; // 5
echo "<br>";

echo $a * $b; // 50
echo "<br>";

echo $a / $b; // 2
echo "<br>";

echo $a % $b; // 0 (modulus)
?>

//Comparison Operators
<?php
$a = 10;
$b = "10";

var_dump($a == $b);   // true (value same)
echo "<br>";

var_dump($a === $b);  // false (type different)
echo "<br>";

var_dump($a != $b);   // false
echo "<br>";

var_dump($a > 5);     // true
echo "<br>";

var_dump($a < 5);     // false
?>

//Assignment Operators
<?php
$x = 10;

$x += 5;  // x = x + 5
echo $x;  // 15

echo "<br>";

$x -= 3;
echo $x;  // 12

echo "<br>";

$x *= 2;
echo $x;  // 24

echo "<br>";

$x /= 4;
echo $x;  // 6
?>

//Increment and Decrement Operators
<?php
$x = 5;

echo ++$x; // 6 (pre-increment)
echo "<br>";

echo $x++; // 6 (post-increment)
echo "<br>";

echo --$x; // 6 (pre-decrement)
echo "<br>";

echo $x--; // 6 (post-decrement)
?>

//Logical Operators
<?php
$a = true;
$b = false;

var_dump($a && $b); // false (AND)
echo "<br>";

var_dump($a || $b); // true (OR)
echo "<br>";

var_dump(!$a);      // false (NOT)
?>

//String Operators
<?php
$first = "Hello";
$second = "World";

echo $first . " " . $second; // Hello World

echo "<br>";

$first .= " PHP";
echo $first; // Hello PHP
?>

//Array Operators
<?php
$a = array("a" => "Red", "b" => "Green");
$b = array("c" => "Blue", "d" => "Yellow");

$c = $a + $b; // union

print_r($c);
?>

//Ternary Operator
<?php
$age = 18;

$result = ($age >= 18) ? "Adult" : "Minor";

echo $result;
?>

//Null Coalescing Operator
<?php
$username = $_GET['user'] ?? "Guest";

echo $username;
?>

//Combining Operators
<?php
$a = 20;
$b = 10;

echo "Addition: " . ($a + $b) . "<br>";
echo "Subtraction: " . ($a - $b) . "<br>";

if ($a > $b) {
    echo "A is greater<br>";
}

$status = ($a % 2 == 0) ? "Even" : "Odd";
echo "A is " . $status;
?>