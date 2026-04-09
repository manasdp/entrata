//Basic Regex Match
<?php
$str = "Hello World";

if (preg_match("/World/", $str)) {
    echo "Match found!";
}
?>

//Case Insensitive Match
<?php
$str = "hello world";

if (preg_match("/HELLO/i", $str)) {
    echo "Match found!";
}
?>

//Match All Occurrences
<?php
$str = "cat bat mat";

preg_match_all("/at/", $str, $matches);

print_r($matches);
?>

// Replace Using Regex
<?php
$str = "I love Java";

echo preg_replace("/Java/", "PHP", $str);
?>

//Validate Email
<?php
$email = "test@gmail.com";

if (preg_match("/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,}$/", $email)) {
    echo "Valid Email";
} else {
    echo "Invalid Email";
}
?>

// Validate Mobile Number
<?php
$phone = "9876543210";

if (preg_match("/^[0-9]{10}$/", $phone)) {
    echo "Valid Number";
}
?>

//Validate Password

<?php
$password = "Test@123";

if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
    echo "Strong Password";
} else {
    echo "Weak Password";
}
?>

//Extract Numbers from String
<?php
$str = "Order123 Price456";

preg_match_all("/\d+/", $str, $matches);

print_r($matches[0]);
?>

//Remove Special Characters
<?php
$str = "Hello@#123";

echo preg_replace("/[^a-zA-Z0-9]/", "", $str);
?>

//Check Only Alphabets
<?php
$name = "Manas";

if (preg_match("/^[a-zA-Z]+$/", $name)) {
    echo "Valid Name";
}
?>
//Combined Practice
<?php
$email = "test@gmail.com";
$phone = "9876543210";

if (!preg_match("/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,}$/", $email)) {
    echo "Invalid Email<br>";
}

if (!preg_match("/^[0-9]{10}$/", $phone)) {
    echo "Invalid Phone<br>";
}

echo "Validation Done!";
?>