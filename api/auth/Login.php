<?php
session_start(); // Mulai sesi

include "../../config/config.php";
include "../../app/core/database.php";

$key = "mahasiswa_leveling";
$username = $_POST['username'];
$password = $_POST['password'];
// $password = openssl_encrypt($uen_password, "AES-256-CBC", $key, 0, substr(md5($key), 0, 16));
$conn = Database::getInstance();
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$hashPassword = $data['password'];

if (password_verify($password, $hashPassword)) {
    $_SESSION['username'] = $username; // Menyimpan username dalam sesi
    $_SESSION['isAdmin'] = $data['isAdmin']; // Menyimpan isAdmin dalam sesi
    echo 'success';
} else {    
    echo 'error';
}

?>
