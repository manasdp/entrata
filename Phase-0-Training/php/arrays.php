// Passing Array to Function
<?php
function printArray($arr) {
    foreach ($arr as $value) {
        echo $value . "<br>";
    }
}

$numbers = [10, 20, 30];
printArray($numbers);
?>

// 2. Sum of Array Elements
<?php
function sumArray($arr) {
    $sum = 0;

    foreach ($arr as $num) {
        $sum += $num;
    }

    return $sum;
}

$numbers = [5, 10, 15];
echo sumArray($numbers);
?>

// 3. Find Maximum Value
<?php
function findMax($arr) {
    return max($arr);
}

echo findMax([10, 50, 30]);
?>

// 4. Search in Array
<?php
function searchValue($arr, $value) {
    if (in_array($value, $arr)) {
        return "Found";
    } else {
        return "Not Found";
    }
}

echo searchValue([1,2,3,4], 3);
?>

// 5. Return Array from Function
<?php
function getFruits() {
    return ["Apple", "Banana", "Mango"];
}

$fruits = getFruits();

print_r($fruits);
?>

//6. Associative Array in Function
<?php
function printStudent($student) {
    foreach ($student as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
}

$student = [
    "name" => "Manas",
    "age" => 22,
    "city" => "Pune"
];

printStudent($student);
?>

//7. Multidimensional Array + Function
<?php
function printUsers($users) {
    foreach ($users as $user) {
        echo $user["name"] . " - " . $user["age"] . "<br>";
    }
}

$users = [
    ["name" => "Manas", "age" => 22],
    ["name" => "Rahul", "age" => 25]
];

printUsers($users);
?>

//8. Modify Array Using Function (Reference)
<?php
function addItem(&$arr, $item) {
    $arr[] = $item;
}

$numbers = [1, 2, 3];

addItem($numbers, 4);

print_r($numbers);
?>

//9. Filter Array 
<?php
function getEvenNumbers($arr) {
    $result = [];

    foreach ($arr as $num) {
        if ($num % 2 == 0) {
            $result[] = $num;
        }
    }

    return $result;
}

print_r(getEvenNumbers([1,2,3,4,5,6]));
?>

//10. Use Built-in Functions Inside Function
<?php
function sortArray($arr) {
    sort($arr);
    return $arr;
}

print_r(sortArray([5,3,8,1]));
?>

// Real Mini Project Example
<?php
function getAverage($marks) {
    return array_sum($marks) / count($marks);
}

function getGrade($avg) {
    if ($avg >= 90) return "A";
    elseif ($avg >= 70) return "B";
    elseif ($avg >= 50) return "C";
    else return "Fail";
}

$marks = [80, 75, 90, 85];

$avg = getAverage($marks);

echo "Average: " . $avg . "<br>";
echo "Grade: " . getGrade($avg);
?>