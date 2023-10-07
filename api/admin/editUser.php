<?php

session_start();

include "../../config/config.php";
include "../../app/core/database.php";

$user_id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$isAdmin = $_POST['isAdmin'];
$image_path = $_POST['image_path'];
$total_achievement = $_POST['total_achievement'];
$total_quest = $_POST['total_quest'];
$level = $_POST['level'];
$current_experience = $_POST['current_experience'];
$target_experience = $_POST['target_experience'];

$key = "mahasiswa_leveling";

$en_password = openssl_encrypt($password, "AES-256-CBC", $key, 0, substr(md5($key), 0, 16));

$conn = Database::getInstance();

$sql = "UPDATE users SET username = '$username', name = '$name', email = '$email', password = '$en_password', isAdmin = '$isAdmin', image_path = '$image_path', total_achievement = '$total_achievement', total_quest = '$total_quest', level = '$level', current_experience = '$current_experience', target_experience = '$target_experience' WHERE id = $user_id";

if ($conn->query($sql) === TRUE) {
    echo 'success';
} else {
    echo 'error';
}
?>
