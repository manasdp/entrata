//1. for Loop

<?php
for ($i = 1; $i <= 5; $i++) {
    echo $i . "<br>";
}
?>

//2. while Loop

<?php
$i = 1;

while ($i <= 5) {
    echo $i . "<br>";
    $i++;
}
?>

// 3. do...while Loop

<?php
$i = 1;

do {
    echo $i . "<br>";
    $i++;
} while ($i <= 5);
?>

// 4. foreach Loop 

<?php
$colors = ["Red", "Green", "Blue"];

foreach ($colors as $color) {
    echo $color . "<br>";
}
?>

// 5. foreach with Key => Value
<?php
$student = [
    "name" => "Manas",
    "age" => 22,
    "city" => "Pune"
];

foreach ($student as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
?>

// 6. Nested Loops
<?php
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        echo $i . "-" . $j . " ";
    }
    echo "<br>";
}
?>

// 7. Loop with break
<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 6) {
        break;
    }
    echo $i . " ";
}
?>
//8. Loop with continue
<?php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue;
    }
    echo $i . " ";
}
?>

// 9. Reverse Loop
<?php
for ($i = 5; $i >= 1; $i--) {
    echo $i . "<br>";
}
?>

// 10. Loop Through Array
<?php
$numbers = [10, 20, 30, 40];

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . "<br>";
}
?>

// Combined Practice Program
<?php
for ($i = 1; $i <= 10; $i++) {

    if ($i % 2 == 0) {
        continue; // skip even
    }

    if ($i == 9) {
        break; // stop early
    }

    echo $i . "<br>";
}
?>
🔥 Pattern Programs (IMPORTANT FOR LOGIC)
⭐ Star Pattern
<?php
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}
?>
⭐ Number Pattern
<?php
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}
?>