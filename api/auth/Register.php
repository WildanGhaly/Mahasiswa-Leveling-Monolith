<?php

include "../../config/config.php";
include "../../app/core/database.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$key = "mahasiswa_leveling";

$en_password = openssl_encrypt($password, "AES-256-CBC", $key, 0, substr(md5($key), 0, 16));

$conn = Database::getInstance();

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$en_password')";
if ($conn->query($sql) === TRUE) {
    setcookie('username', $username, time() + (30 * 24 * 60 * 60), '/');
    echo 'success';
} else {
    echo 'error';
}
?>

 