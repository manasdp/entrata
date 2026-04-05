<?php
/**
 * Shared input validation for Fashion Fusion (front + admin).
 * Returns arrays: ['ok' => bool, 'msg' => string] or ['ok' => true, 'value' => mixed]
 */
if (!defined('FF_VALIDATION_LOADED')) {
    define('FF_VALIDATION_LOADED', true);
}

function ff_db_escape($con, $str)
{
    if (!$con) {
        return (string) $str;
    }
    return mysqli_real_escape_string($con, (string) $str);
}

function ff_trim_str($v)
{
    return is_string($v) ? trim($v) : '';
}

function ff_validate_positive_int($v, $min = 1, $max = PHP_INT_MAX)
{
    if ($v === '' || $v === null) {
        return ['ok' => false, 'msg' => 'Invalid value.'];
    }
    $s = (string) $v;
    if (!ctype_digit($s)) {
        return ['ok' => false, 'msg' => 'Must be a positive whole number.'];
    }
    $n = (int) $s;
    if ($n < $min || $n > $max) {
        return ['ok' => false, 'msg' => "Value must be between $min and $max."];
    }
    return ['ok' => true, 'value' => $n];
}

function ff_validate_name($name, $minLen = 2, $maxLen = 100)
{
    $name = ff_trim_str($name);
    if ($name === '') {
        return ['ok' => false, 'msg' => 'Name is required.'];
    }
    if (strlen($name) < $minLen || strlen($name) > $maxLen) {
        return ['ok' => false, 'msg' => "Name must be between $minLen and $maxLen characters."];
    }
    if (preg_match('/[0-9]/', $name)) {
        return ['ok' => false, 'msg' => 'Numbers are not allowed in the name.'];
    }
    if (!preg_match("/^[a-zA-Z\s\-'\.]+$/u", $name)) {
        return ['ok' => false, 'msg' => 'Name contains invalid characters.'];
    }
    return ['ok' => true, 'value' => $name];
}

function ff_validate_email_addr($email)
{
    $email = ff_trim_str($email);
    if ($email === '') {
        return ['ok' => false, 'msg' => 'Email is required.'];
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['ok' => false, 'msg' => 'Enter a valid email address.'];
    }
    if (strlen($email) > 254) {
        return ['ok' => false, 'msg' => 'Email is too long.'];
    }
    return ['ok' => true, 'value' => $email];
}

function ff_validate_contact_in($contact)
{
    $contact = preg_replace('/\s+/', '', ff_trim_str($contact));
    if ($contact === '') {
        return ['ok' => false, 'msg' => 'Contact number is required.'];
    }
    if (!preg_match('/^[6-9][0-9]{9}$/', $contact)) {
        return ['ok' => false, 'msg' => 'Enter a valid 10-digit Indian mobile number.'];
    }
    return ['ok' => true, 'value' => $contact];
}

function ff_validate_password_min($password, $min = 8, $max = 128)
{
    $password = (string) $password;
    if ($password === '') {
        return ['ok' => false, 'msg' => 'Password is required.'];
    }
    $len = strlen($password);
    if ($len < $min) {
        return ['ok' => false, 'msg' => "Password must be at least $min characters."];
    }
    if ($len > $max) {
        return ['ok' => false, 'msg' => 'Password is too long.'];
    }
    return ['ok' => true, 'value' => $password];
}

function ff_validate_gender($gender)
{
    $g = ff_trim_str($gender);
    if ($g === '' || !in_array($g, ['Male', 'Female'], true)) {
        return ['ok' => false, 'msg' => 'Please select gender.'];
    }
    return ['ok' => true, 'value' => $g];
}

function ff_validate_login_password_present($password)
{
    $password = (string) $password;
    if ($password === '') {
        return ['ok' => false, 'msg' => 'Password is required.'];
    }
    if (strlen($password) > 128) {
        return ['ok' => false, 'msg' => 'Invalid password.'];
    }
    return ['ok' => true, 'value' => $password];
}

function ff_validate_pincode_in($pin)
{
    $pin = ff_trim_str($pin);
    if ($pin === '') {
        return ['ok' => false, 'msg' => 'PIN code is required.'];
    }
    if (!preg_match('/^[0-9]{6}$/', $pin)) {
        return ['ok' => false, 'msg' => 'PIN code must be exactly 6 digits.'];
    }
    return ['ok' => true, 'value' => $pin];
}

function ff_validate_city_state_country($text, $label, $min = 2, $max = 80)
{
    $t = ff_trim_str($text);
    if ($t === '') {
        return ['ok' => false, 'msg' => "$label is required."];
    }
    if (strlen($t) < $min || strlen($t) > $max) {
        return ['ok' => false, 'msg' => "$label must be between $min and $max characters."];
    }
    if (!preg_match("/^[a-zA-Z\s\-'\.]+$/u", $t)) {
        return ['ok' => false, 'msg' => "$label contains invalid characters."];
    }
    return ['ok' => true, 'value' => $t];
}

function ff_validate_address($addr, $max = 500)
{
    $a = ff_trim_str($addr);
    if ($a === '') {
        return ['ok' => false, 'msg' => 'Address is required.'];
    }
    if (strlen($a) < 5 || strlen($a) > $max) {
        return ['ok' => false, 'msg' => 'Enter a complete address (5–' . $max . ' characters).'];
    }
    return ['ok' => true, 'value' => $a];
}

function ff_validate_contact_message($msg, $min = 10, $max = 5000)
{
    $m = ff_trim_str($msg);
    if ($m === '') {
        return ['ok' => false, 'msg' => 'Message is required.'];
    }
    if (strlen($m) < $min) {
        return ['ok' => false, 'msg' => "Message must be at least $min characters."];
    }
    if (strlen($m) > $max) {
        return ['ok' => false, 'msg' => "Message must not exceed $max characters."];
    }
    return ['ok' => true, 'value' => $m];
}

function ff_validate_product_name($name, $max = 200)
{
    $n = ff_trim_str($name);
    if ($n === '') {
        return ['ok' => false, 'msg' => 'Product name is required.'];
    }
    if (strlen($n) > $max) {
        return ['ok' => false, 'msg' => 'Product name is too long.'];
    }
    return ['ok' => true, 'value' => $n];
}

function ff_validate_price($price, $max = 99999999.99)
{
    if ($price === '' || $price === null) {
        return ['ok' => false, 'msg' => 'Price is required.'];
    }
    if (!is_numeric($price)) {
        return ['ok' => false, 'msg' => 'Price must be a number.'];
    }
    $p = (float) $price;
    if ($p < 0 || $p > $max) {
        return ['ok' => false, 'msg' => 'Invalid price.'];
    }
    return ['ok' => true, 'value' => $p];
}

function ff_validate_product_description($desc, $max = 5000)
{
    $d = ff_trim_str($desc);
    if ($d === '') {
        return ['ok' => false, 'msg' => 'Description is required.'];
    }
    if (strlen($d) > $max) {
        return ['ok' => false, 'msg' => 'Description is too long.'];
    }
    return ['ok' => true, 'value' => $d];
}

function ff_validate_cart_quantity($q, $min = 1, $max = 20)
{
    return ff_validate_positive_int($q, $min, $max);
}

function ff_validate_upload_image($fileKey, $required = true)
{
    if (!isset($_FILES[$fileKey])) {
        return $required ? ['ok' => false, 'msg' => 'Please select an image.'] : ['ok' => true, 'value' => ''];
    }
    $f = $_FILES[$fileKey];
    if ($f['error'] === UPLOAD_ERR_NO_FILE) {
        return $required ? ['ok' => false, 'msg' => 'Please select an image.'] : ['ok' => true, 'value' => ''];
    }
    if ($f['error'] !== UPLOAD_ERR_OK) {
        return ['ok' => false, 'msg' => 'Image upload failed.'];
    }
    $name = $f['name'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($ext, $allowed, true)) {
        return ['ok' => false, 'msg' => 'Allowed image types: JPG, PNG, GIF, WebP.'];
    }
    if ($f['size'] > 5 * 1024 * 1024) {
        return ['ok' => false, 'msg' => 'Image must be 5MB or smaller.'];
    }
    return ['ok' => true, 'value' => $name, 'tmp' => $f['tmp_name']];
}

function ff_validate_product_id_string($id)
{
    $id = ff_trim_str($id);
    if ($id === '' || strlen($id) > 32) {
        return ['ok' => false, 'msg' => 'Invalid product ID.'];
    }
    if (!preg_match('/^[A-Za-z0-9\-_]+$/', $id)) {
        return ['ok' => false, 'msg' => 'Invalid product ID format.'];
    }
    return ['ok' => true, 'value' => $id];
}
