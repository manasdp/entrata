<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../login_logic.php';

class LoginTest extends TestCase
{
    public function testEmptyInput()
    {
        $this->assertEquals("User not found!", loginUser(null, ""));
    }

    public function testInvalidUser()
{
    $this->assertEquals(
        "User not found!",
        loginUser(null, "123")
    );
}

public function testWrongPassword()
{
    $user = [
        "email" => "test@gmail.com",
        "password" => password_hash("123456", PASSWORD_DEFAULT)
    ];

    $this->assertEquals(
        "Invalid Email or Password!",
        loginUser($user, "wrong")
    );
}

public function testSuccessfulLogin()
{
    $user = [
        "email" => "test@gmail.com",
        "password" => password_hash("123456", PASSWORD_DEFAULT)
    ];

    $this->assertEquals(
        "success",
        loginUser($user, "123456")
    );
}
}