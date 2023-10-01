<?php
include_once __DIR__."/../session.php";

$conn = Database::getInstance();
$username = $_SESSION['username'];

$conn = Database::getInstance();
$username = $_SESSION['username'];

$sql = "SELECT current_experience, target_experience FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$current = $row['current_experience'];
$target = $row['target_experience'];

echo $current . '/' . $target;