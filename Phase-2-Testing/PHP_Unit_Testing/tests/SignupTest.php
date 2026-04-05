<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../signup_logic.php';

class SignupTest extends TestCase
{
    public function testEmptyInput()
    {
        $this->assertEquals(
            "Validation failed",
            signupUser([])
        );
    }

    public function testEmailAlreadyExists()
    {
        $user = [
            "name" => "Manas",
            "email" => "test@gmail.com",
            "contact" => "9876543210",
            "gender" => "Male",
            "password" => "12345678"
        ];

        $this->assertEquals(
            "Email already taken",
            signupUser($user, true)
        );
    }

    public function testSuccessfulSignup()
    {
        $user = [
            "name" => "Manas",
            "email" => "test@gmail.com",
            "contact" => "9876543210",
            "gender" => "Male",
            "password" => "12345678"
        ];

        $this->assertEquals(
            "Account Created",
            signupUser($user, false, true)
        );
    }

    public function testInsertFailure()
    {
        $user = [
            "name" => "Manas",
            "email" => "test@gmail.com",
            "contact" => "9876543210",
            "gender" => "Male",
            "password" => "12345678"
        ];

        $this->assertEquals(
            "Insert failed",
            signupUser($user, false, false)
        );
    }
}