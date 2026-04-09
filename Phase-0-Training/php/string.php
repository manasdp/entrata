//create strings
<?php
$name = "Manas";
echo $name;

echo "<br>";

$msg = 'Hello World';
echo $msg;
?>

//String Concatenation
<?php
$first = "Hello";
$second = "Manas";

echo $first . " " . $second;
?>

//string length
<?php
$str = "Hello World";

echo strlen($str); // 11
?>

//word count
<?php
$str = "PHP is awesome";

echo str_word_count($str);
?>

//string reverse
<?php
$str = "Manas";

echo strrev($str); // sanaM
?>

//6. Convert Case
<?php
$str = "hello world";

echo strtoupper($str); // HELLO WORLD
echo "<br>";

echo strtolower($str); // hello world
?>

//7. Replace Text
<?php
$str = "I love Java";

echo str_replace("Java", "PHP", $str);
?>

//8. Find Position
<?php
$str = "Hello PHP";

echo strpos($str, "PHP"); // position
?>
//9. Substring
<?php
$str = "Hello World";

echo substr($str, 0, 5); // Hello
?>
//10. Trim (Remove Spaces)
<?php
$str = "   Hello   ";

echo trim($str);
?>
//11. Explode (String → Array)
<?php
$str = "apple,banana,mango";

$arr = explode(",", $str);

print_r($arr);
?>
//12. Implode (Array → String)
<?php
$arr = array("apple", "banana", "mango");

$str = implode(", ", $arr);

echo $str;
?>
//13. String Comparison
<?php
$a = "Hello";
$b = "hello";

var_dump($a == $b);  // false (case sensitive)
?>
//14. Escape Characters
<?php
echo "He said \"Hello\"";
?>

//Combined Practice Program
<?php
$name = "  Manas Patil  ";

echo "Original: " . $name . "<br>";

$name = trim($name);

echo "Trimmed: " . $name . "<br>";
echo "Uppercase: " . strtoupper($name) . "<br>";
echo "Length: " . strlen($name) . "<br>";

if (strpos($name, "Patil") !== false) {
    echo "Surname found!";
}
?>