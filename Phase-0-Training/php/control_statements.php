//1. if Statement
<?php
$age = 18;

if ($age >= 18) {
    echo "You are eligible to vote";
}
?>
// 2. if - else
<?php
$age = 16;

if ($age >= 18) {
    echo "Adult";
} else {
    echo "Minor";
}
?>
// 3. if - elseif - else
<?php
$marks = 75;

if ($marks >= 90) {
    echo "Grade A";
} elseif ($marks >= 70) {
    echo "Grade B";
} elseif ($marks >= 50) {
    echo "Grade C";
} else {
    echo "Fail";
}
?>
// 4. Nested if
<?php
$age = 20;
$hasID = true;

if ($age >= 18) {
    if ($hasID) {
        echo "Entry allowed";
    } else {
        echo "ID required";
    }
}
?>
// 5. switch Statement 

<?php
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Start of week";
        break;

    case "Friday":
        echo "Weekend coming";
        break;

    case "Sunday":
        echo "Holiday";
        break;

    default:
        echo "Normal day";
}
?>
// 6. break Statement

<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break;
    }
    echo $i . " ";
}
?>


// 7. continue Statement


<?php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue;
    }
    echo $i . " ";
}
?>

// 8. break in switch
<?php
$num = 2;

switch ($num) {
    case 1:
        echo "One";
        break;

    case 2:
        echo "Two";
        break;

    case 3:
        echo "Three";
        break;
}
?>

// Combined Practice Program 
<?php
for ($i = 1; $i <= 10; $i++) {

    if ($i % 2 == 0) {
        continue; // skip even numbers
    }

    if ($i == 9) {
        break; // stop at 9
    }

    echo $i . "<br>";
}
?>