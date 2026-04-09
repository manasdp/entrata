//1. Create Cookie
<?php
setcookie("username", "Manas", time() + 3600); // 1 hour
?>

//2. Read Cookie
<?php
if (isset($_COOKIE['username'])) {
    echo "Welcome " . $_COOKIE['username'];
}
?>
//3. Delete Cookie
<?php
setcookie("username", "", time() - 3600);
?>
//4. Cookie Example (User Visit)
<?php
$visits = $_COOKIE['visits'] ?? 0;
$visits++;

setcookie("visits", $visits, time() + 3600);

echo "Visits: " . $visits;
?>

// 1. Start Session
<?php
session_start();
?>

// 2. Store Data in Session
<?php
session_start();

$_SESSION['user'] = "Manas";

echo "Session set!";
?>

// 3. Access Session
<?php
session_start();

echo "Welcome " . $_SESSION['user'];
?>

// 4. Destroy Session
<?php
session_start();

session_unset();
session_destroy();
?>
// Real Login Example 
// login.php
<?php
session_start();

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "1234") {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login!";
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit">
</form>

// dashboard.php
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome " . $_SESSION['user'];
?>

<a href="logout.php">Logout</a>

// logout.php
<?php
session_start();

session_destroy();

header("Location: login.php");
?>