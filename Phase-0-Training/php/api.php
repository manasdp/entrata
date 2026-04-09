//Basic PHP API (Return JSON)
<?php
header("Content-Type: application/json");

$data = [
    "name" => "Manas",
    "age" => 22,
    "city" => "Pune"
];

echo json_encode($data);
?>

<!-- Output:

{
  "name": "Manas",
  "age": 22,
  "city": "Pune"
} -->

// GET API Example
<?php
header("Content-Type: application/json");

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    echo json_encode([
        "message" => "Hello " . $name
    ]);
}
?>

<!-- URL:

http://localhost/api.php?name=Manas -->

//POST API Example
<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    echo json_encode([
        "status" => "success",
        "name" => $name
    ]);
}
?>

//Read JSON Input 

<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

echo json_encode([
    "received" => $data
]);
?>

//API with Condition
<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if ($data['age'] >= 18) {
    echo json_encode(["status" => "Adult"]);
} else {
    echo json_encode(["status" => "Minor"]);
}
?>

//Calling API using PHP
<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts/1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

print_r($data);
?>

//Simple REST API Structure
<?php
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case "GET":
        echo json_encode(["message" => "GET request"]);
        break;

    case "POST":
        echo json_encode(["message" => "POST request"]);
        break;

    case "PUT":
        echo json_encode(["message" => "PUT request"]);
        break;

    case "DELETE":
        echo json_encode(["message" => "DELETE request"]);
        break;

    default:
        echo json_encode(["error" => "Invalid request"]);
}
?>

//Mini Real API Example
<?php
header("Content-Type: application/json");

$users = [
    ["id" => 1, "name" => "Manas"],
    ["id" => 2, "name" => "Rahul"]
];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    echo json_encode($users);
}
?>