<?php

function loginUser($userRow, $password)
{
    if (!$userRow) {
        return "User not found!";
    }

    if (password_verify($password, $userRow['password'])) {
        return "success";
    }

    return "Invalid Email or Password!";
}