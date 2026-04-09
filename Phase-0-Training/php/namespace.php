//Basic Namespace Syntax
<?php
namespace MyApp;

class User {
    public function hello() {
        echo "Hello from User class";
    }
}
?>

// Using Namespace Class
<?php
require "User.php";

$user = new MyApp\User();
$user->hello();
?>

 //Multiple Namespaces
<?php
namespace App\Admin;

class User {
    public function role() {
        echo "Admin";
    }
}
?>

<?php
namespace App\User;

class User {
    public function role() {
        echo "Customer";
    }
}
?>

//Usage:

<?php
require "AdminUser.php";
require "User.php";

$admin = new App\Admin\User();
$user = new App\User\User();

$admin->role();
$user->role();
?>

//use Keyword

<?php
require "User.php";

use MyApp\User;

$user = new User();
$user->hello();
?>

//Aliasing 

<?php
use MyApp\User as MyUser;

$user = new MyUser();
?>

//Global Namespace
<?php
namespace MyApp;

class Test {
    public function show() {
        echo strlen("Hello"); // global function
    }
}
?>

//explicitly:

echo \strlen("Hello");

//Namespace for Functions
<?php
namespace MyApp;

function greet() {
    echo "Hello!";
}
?>

<?php
require "file.php";

\MyApp\greet();
?>

//Namespace for Constants
<?php
namespace MyApp;

const PI = 3.14;

echo PI;
?>

//User.php
<?php
namespace App\Models;

class User {
    public function getName() {
        return "Manas";
    }
}
?>

//UserController.php
<?php
namespace App\Controllers;

use App\Models\User;

class UserController {
    public function show() {
        $user = new User();
        echo $user->getName();
    }
}
?>
// index.php
<?php
require "app/Models/User.php";
require "app/Controllers/UserController.php";

use App\Controllers\UserController;

$controller = new UserController();
$controller->show();
?>