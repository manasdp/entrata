//Create & Write File
<?php
$file = fopen("test.txt", "w"); // w = write mode

fwrite($file, "Hello Manas\n");
fwrite($file, "Welcome to PHP");

fclose($file);
?>

//2. Read File
<?php
$file = fopen("test.txt", "r");

echo fread($file, filesize("test.txt"));

fclose($file);
?>

//3. Read File Line by Line
<?php
$file = fopen("test.txt", "r");

while (!feof($file)) {
    echo fgets($file) . "<br>";
}

fclose($file);
?>

//4. Append Data to File
<?php
$file = fopen("test.txt", "a"); // append mode

fwrite($file, "\nNew Line Added");

fclose($file);
?>

//5. File Exists Check
<?php
if (file_exists("test.txt")) {
    echo "File exists";
} else {
    echo "File not found";
}
?>

//6. Delete File
<?php
unlink("test.txt");
?>

//7. Shortcut Functions
<?php
file_put_contents("demo.txt", "Hello PHP");

echo file_get_contents("demo.txt");
?>

//8. File Upload
<form method="POST" enctype="multipart/form-data">
    Select file:
    <input type="file" name="myfile">
    <input type="submit">
</form>
<?php
if ($_FILES) {
    $filename = $_FILES['myfile']['name'];
    $temp = $_FILES['myfile']['tmp_name'];

    move_uploaded_file($temp, "uploads/" . $filename);

    echo "File uploaded!";
}
?>

//1. Current Date
<?php
echo date("Y-m-d");
?>
//2. Current Time
<?php
echo date("H:i:s");
?>
//3. Full Date Format
<?php
echo date("l, d M Y");
?>

//4. Timestamp
<?php
echo time();
?>

//5. Convert String to Date
<?php
$date = "2026-04-10";

echo date("d-m-Y", strtotime($date));
?>
//6. Add Days
<?php
echo date("Y-m-d", strtotime("+5 days"));
?>
//7. Difference Between Dates
<?php
$date1 = strtotime("2026-04-01");
$date2 = strtotime("2026-04-10");

$diff = ($date2 - $date1) / (60 * 60 * 24);

echo "Days: " . $diff;
?>
//8. Date with Timezone
<?php
date_default_timezone_set("Asia/Kolkata");

echo date("Y-m-d H:i:s");
?>

//Combined Real Example

<?php
$name = "Manas";

$data = "User: $name | Date: " . date("Y-m-d H:i:s") . "\n";

file_put_contents("log.txt", $data, FILE_APPEND);

echo "Data saved!";
?>