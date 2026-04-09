//1. __construct() (Constructor)

<?php
class User {
    public function __construct() {
        echo "Object created!";
    }
}

$obj = new User();
?>

//2. __destruct() (Destructor)

<?php
class Test {
    public function __destruct() {
        echo "Object destroyed!";
    }
}

$obj = new Test();
?>

//__get() (Access undefined property)
<?php
class User {
    private $data = ["name" => "Manas"];

    public function __get($key) {
        return $this->data[$key] ?? "Not found";
    }
}

$user = new User();
echo $user->name;
?>
//__set() (Set undefined property)
<?php
class User {
    private $data = [];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }
}

$user = new User();
$user->name = "Manas";

print_r($user);
?>

// __call() (Call undefined method)
<?php
class Test {
    public function __call($method, $args) {
        echo "Method $method not found";
    }
}

$obj = new Test();
$obj->hello();
?>
// 6. __toString() (Convert object to string)
<?php
class User {
    public function __toString() {
        return "User object";
    }
}

$obj = new User();
echo $obj;
?>
// 7. __invoke() (Object as function)
<?php
class Test {
    public function __invoke() {
        echo "Object called as function";
    }
}

$obj = new Test();
$obj();
?>
// 8. __clone() (Object cloning)
<?php
class Test {
    public function __clone() {
        echo "Object cloned";
    }
}

$obj1 = new Test();
$obj2 = clone $obj1;
?>
// 9. __sleep() and __wakeup()

<?php
class Test {
    public function __sleep() {
        echo "Serializing";
        return [];
    }

    public function __wakeup() {
        echo "Unserialized";
    }
}

$obj = new Test();
serialize($obj);
?>

// 10. __isset() and __unset()
<?php
class Test {
    private $data = ["name" => "Manas"];

    public function __isset($key) {
        return isset($this->data[$key]);
    }

    public function __unset($key) {
        unset($this->data[$key]);
    }
}

$obj = new Test();
var_dump(isset($obj->name));
?>

//Combined Example 
<?php
class User {
    private $data = [];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key] ?? null;
    }

    public function __toString() {
        return "User: " . ($this->data['name'] ?? "Unknown");
    }
}

$user = new User();
$user->name = "Manas";

echo $user->name . "<br>";
echo $user;
?>