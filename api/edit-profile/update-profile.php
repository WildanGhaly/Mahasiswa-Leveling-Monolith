<?php
session_start();

include "../../config/config.php";
include "../../app/core/database.php";

$key = "mahasiswa_leveling";

$name           = $_POST['name'];
$email          = $_POST['email'];
$old_password   = $_POST['old-pw'];
$new_password   = $_POST['new-pw'];

if (!empty($old_password) && !empty($new_password)) {
    $username       = $_SESSION['username'];
    $uen_password   = $_POST['old-pw'];
    $password       = openssl_encrypt($uen_password, "AES-256-CBC", $key, 0, substr(md5($key), 0, 16));

    $conn = Database::getInstance();

    $result = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    if ($result->num_rows > 0) {
        $uen_password = $_POST['new-pw'];
        $password = openssl_encrypt($uen_password, "AES-256-CBC", $key, 0, substr(md5($key), 0, 16));
        $conn->query("UPDATE users SET password = '$password' WHERE username = '$username'");
    } else {
        echo 'error';
        exit();
    }
}

$conn = Database::getInstance();
$username = $_SESSION['username'];

$result = $conn->query("UPDATE users SET name = '$name', email = '$email' WHERE username = '$username'");
if ($result) {
    echo 'success';
} else {
    echo 'error';
}
?>
