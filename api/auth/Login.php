<?php
include "../../config/config.php";
include "../../app/core/database.php";

$key = "mahasiswa_leveling";

$username       = $_POST['username'];
$uen_password   = $_POST['password'];
$password       = openssl_encrypt($uen_password, "AES-256-CBC", $key, 0, substr(md5($key), 0, 16));

$conn = Database::getInstance();

$result = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
if ($result->num_rows > 0) {
    setcookie('username', $username, time() + (30 * 24 * 60 * 60), '/'); // Cookie expires in 30 days
    echo 'success';
} else {
    echo 'error';
}

?>
