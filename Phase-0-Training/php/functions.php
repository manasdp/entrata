//1. Output Functions
<?php
echo "Hello";
print "World";

print_r(array(1,2,3)); // for arrays

var_dump("Hello"); // type + value
?>
//2. String Functions 
<?php
$str = "Hello PHP";

echo strlen($str);        // length
echo str_replace("PHP", "World", $str);
echo strpos($str, "PHP"); // position
echo strtoupper($str);
?>
//3. Math Functions
<?php
echo abs(-10);     // 10
echo sqrt(16);     // 4
echo round(4.6);   // 5
echo ceil(4.2);    // 5
echo floor(4.9);   // 4
echo rand(1, 100); // random number
?>
//4. Array Functions
<?php
$arr = [5, 2, 8, 1];

sort($arr);        // ascending
print_r($arr);

echo count($arr);  // length

array_push($arr, 10);
print_r($arr);

array_pop($arr);
print_r($arr);
?>
//5. Date & Time Functions
<?php
echo date("Y-m-d");     // current date
echo "<br>";

echo date("H:i:s");     // current time

echo "<br>";

echo time();            // timestamp
?>
//6. File Functions (Basic)
<?php
$file = fopen("test.txt", "w");

fwrite($file, "Hello File");

fclose($file);
?>

//Read file:

<?php
echo file_get_contents("test.txt");
?>
//7. Type Checking Functions
<?php
$x = 10;

var_dump(is_int($x));     // true
var_dump(is_string($x));  // false
?>
//8. Variable Handling Functions
<?php
$name = "Manas";

echo isset($name);   // true

unset($name);

// echo $name; // undefined
?>
//9. Number Checking
<?php
$x = 10.5;

var_dump(is_numeric($x)); // true
?>
//10. JSON Functions 
<?php
$data = ["name" => "Manas", "age" => 22];

$json = json_encode($data);
echo $json;

echo "<br>";

print_r(json_decode($json, true));
?>
//11. Include / Require
<?php
include "header.php";
require "config.php";
?>
//phpCombined Practice Program
<?php
$arr = [10, 20, 30];

array_push($arr, 40);

echo "Count: " . count($arr) . "<br>";

echo "Random: " . rand(1, 100) . "<br>";

echo "Date: " . date("Y-m-d") . "<br>";

$str = "hello";

echo strtoupper($str);
?>