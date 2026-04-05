<?php

function signupUser($userData, $existingUser = false, $insertSuccess = true)
{
    // Validate inputs (basic simulation)
    if (
        empty($userData['name']) ||
        empty($userData['email']) ||
        empty($userData['contact']) ||
        empty($userData['gender']) ||
        empty($userData['password'])
    ) {
        return "Validation failed";
    }

    // Check if email already exists
    if ($existingUser) {
        return "Email already taken";
    }

    // Simulate insert result
    if ($insertSuccess) {
        return "Account Created";
    } else {
        return "Insert failed";
    }
}